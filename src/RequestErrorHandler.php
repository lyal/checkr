<?php

namespace Lyal\Checkr;

use Lyal\Checkr\Exceptions\Client\BadRequest;
use Lyal\Checkr\Exceptions\Client\Conflict;
use Lyal\Checkr\Exceptions\Client\Forbidden;
use Lyal\Checkr\Exceptions\Client\NotFound;
use Lyal\Checkr\Exceptions\Client\Unauthorized;
use Lyal\Checkr\Exceptions\Server\InternalServerError;
use Lyal\Checkr\Exceptions\UnhandledRequestError;

class RequestErrorHandler
{
    private $exception;
    private $body;

    public function __construct($exception)
    {
        $this->exception = $exception;
        $this->body = $exception->getResponse()->getBody();
    }

    public function handleError()
    {
        $errorCode = $this->exception->getResponse()->getStatusCode();

        if (method_exists($this, 'handle'.$errorCode)) {
            $this->{'handle'.$errorCode}();
        }
        $this->handleUnknown();
    }

    protected function handle400()
    {
        throw new BadRequest($this->body);
    }

    protected function handle401()
    {
        throw new Unauthorized($this->body);
    }

    protected function handle403()
    {
        throw new Forbidden($this->body);
    }

    protected function handle404()
    {
        throw new NotFound($this->body);
    }

    protected function handle409()
    {
        throw new Conflict($this->body);
    }

    protected function handle500()
    {
        throw new InternalServerError($this->body);
    }

    private function handleUnknown()
    {
        throw new UnhandledRequestError($this->exception->getResponse()->getStatusCode(), $this->body);
    }
}
