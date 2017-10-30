<?php

namespace Lyal\Checkr;

use Guzzle\Http\Message\Response;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\BadResponseException;
use Lyal\Checkr\Exceptions\Client\BadRequest;
use Lyal\Checkr\Exceptions\Client\Conflict;
use Lyal\Checkr\Exceptions\Client\Forbidden;
use Lyal\Checkr\Exceptions\Client\NotFound;
use Lyal\Checkr\Exceptions\Client\Unauthorized;
use Lyal\Checkr\Exceptions\Server\InternalServerError;
use Lyal\Checkr\Exceptions\UnhandledRequestError;
use Lyal\Checkr\Exceptions\UnknownResourceException;

class Client
{
    private $key;
    private $guzzle;
    private $options = [];

    private $lastResponse;

    public $useCollections = true;

    /**
     * Client constructor.
     *
     * @param string|null $key
     * @param array $options
     * @param GuzzleClient|null $guzzle
     */
    public function __construct($key = null, array $options = [], GuzzleClient $guzzle = null)
    {
        $this->setHttpClient($guzzle ?? new GuzzleClient());
        $this->setKey($key ?? env('checkr_api_key', null));
        $this->setOptions($options);
    }

    /**
     * @param GuzzleClient $client
     *
     * @return void
     */
    public function setHttpClient(GuzzleClient $client)
    {
        $this->guzzle = $client;
    }

    /**
     * @return mixed
     */
    public function getHttpClient()
    {
        return $this->guzzle;
    }

    /**
     * Fetch an API resource to handle the client request.
     *
     * @param string $name
     * @param array $args
     * @param \Lyal\Checkr\Entities\AbstractEntity $previousObject
     *
     * @throws UnknownResourceException
     *
     * @return mixed
     */
    public function api($name, $args, $previousObject = null)
    {
        // Autoload resource name using studly case
        if (!$className = checkrEntityClassName($name)) {
            throw new UnknownResourceException($name);
        }
        $args = count($args) ? $args[0] : $args;
        $entity = new $className($args, $this);
        if ($previousObject) {
            $entity->setPreviousObject($previousObject);
        }

        return $entity;
    }

    /**
     * Pass all unknown methods to api().
     *
     * @param $name
     * @param $args
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        return $this->api($name, $args);
    }

    /**
     * @param bool $status
     *
     * @return void
     */
    public function setLastResponse($response)
    {
        $this->lastResponse = $response;
    }

    /**
     * @return Response
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * Set a key for authentication with checkr.
     *
     * @param $key
     *
     * @return void
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Get the checkr api key.
     *
     * @return string|boolean
     */
    public function getKey()
    {
        return $this->key ?: env('checkr_api_key', null);
    }

    /**
     * Set options for HttpClient.
     *
     * @param array $options
     *
     * @return array
     */
    public function setOptions(array $options) : array
    {
        return $this->options = $options;
    }

    /**
     * Set individual option.
     *
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    public function setOption($key, $value)
    {
        return $this->options[$key] = $value;
    }

    /**
     * @return array
     */
    public function getOptions() : array
    {
        return $this->options;
    }

    /**
     * @param $key
     *
     * @return bool|mixed
     * @return void
     */
    public function getOption($key)
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }

        return false;
    }

    /**
     * Make a request through Guzzle.
     *
     * Note: $options in the parameters of this function is temporary; for Guzzle options
     * like debug, set them on the $client
     *
     * @param $method
     * @param $path
     * @param array $options
     * @param bool $returnResponse
     *
     * @throws \Lyal\Checkr\Exceptions\UnhandledRequestError
     * @throws \Lyal\Checkr\Exceptions\Client\Unauthorized
     * @throws \Lyal\Checkr\Exceptions\Client\NotFound
     * @throws \Lyal\Checkr\Exceptions\Client\InternalServerError
     * @throws \Lyal\Checkr\Exceptions\Client\Forbidden
     * @throws \Lyal\Checkr\Exceptions\Client\Conflict
     * @throws \Lyal\Checkr\Exceptions\Client\BadRequest
     *
     * @return mixed
     */
    public function request($method, $path, array $options = [])
    {
        $body = '';
        $options = array_merge($this->getOptions(), $options);
        $options['auth'] = [$this->getKey() . ':', ''];

        try {
            $response = $this->getHttpClient()->request($method, $this->getApiEndPoint() . $path, $options);
            $this->setLastResponse($response);
            $body = json_decode((string)$response->getBody());
        } catch (BadResponseException $exception) {
            $this->handleError($exception);
        }

        return $body;
    }

    /**
     * @return string
     */
    public function getApiEndPoint()
    {
        return 'https://api.checkr.com/v1/';
    }

    /**
     *  Throw our own custom handler for errors.
     *
     * @param BadResponseException $exception
     *
     * @throws \Lyal\Checkr\Exceptions\Client\BadRequest
     * @throws \Lyal\Checkr\Exceptions\Client\Unauthorized
     * @throws \Lyal\Checkr\Exceptions\Client\Forbidden
     * @throws \Lyal\Checkr\Exceptions\Client\NotFound
     * @throws \Lyal\Checkr\Exceptions\Client\Conflict
     * @throws \Lyal\Checkr\Exceptions\Server\InternalServerError
     * @throws \Lyal\Checkr\Exceptions\UnhandledRequestError
     */
    private function handleError(BadResponseException $exception)
    {
        $body = $exception->getResponse()->getBody();

        switch ($exception->getResponse()->getStatusCode()) {
            case 400:
                throw new BadRequest($body);
                break;
            case 401:
                throw new Unauthorized($body);
                break;
            case 403:
                throw new Forbidden($body);
                break;
            case 404:
                throw new NotFound($body);
                break;
            case 409:
                throw new Conflict($body);
                break;
            case 500:
                throw new InternalServerError($body);
                break;
            default:
                throw new UnhandledRequestError($exception->getResponse()->getStatusCode(), $body);
        }
    }
}
