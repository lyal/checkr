<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Lyal\Checkr\Entities\Resources\AdverseAction;
use Lyal\Checkr\Exceptions\Client\BadRequest;
use Lyal\Checkr\Exceptions\Client\Conflict;
use Lyal\Checkr\Exceptions\Client\Forbidden;
use Lyal\Checkr\Exceptions\Client\NotFound;
use Lyal\Checkr\Exceptions\Client\Unauthorized;
use Lyal\Checkr\Exceptions\Server\InternalServerError;
use Lyal\Checkr\Exceptions\UnhandledRequestError;
use Lyal\Checkr\Exceptions\UnknownResourceException;
use Tests\UnitTestCase;

class ClientTest extends UnitTestCase
{
    public function testGetGuzzle()
    {
        $client = $this->getClient()->getHttpClient();
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testSetGuzzle()
    {
        $client = $this->getClient();
        $guzzle = $this->mockGuzzle([]);
        $client->setHttpClient($guzzle);
        $this->assertInstanceOf(\GuzzleHttp\Client::class, $client->getHttpClient());
    }

    public function testValidApiCall()
    {
        $client = $this->getClient();
        $previousObject = new AdverseAction(null, $client);
        $object = $client->api('AdverseAction', uniqid('', false), $previousObject);
        $this->assertInstanceOf(get_class($previousObject), $object);
    }

    public function testValidMagicCall()
    {
        $client = $this->getClient();
        $adverseAction = new AdverseAction(null, $client);
        $this->assertInstanceOf(get_class($adverseAction), $client->adverse_action());
    }

    public function testInvalidMagicCall()
    {
        $this->expectException(UnknownResourceException::class);
        $client = $this->getClient();
        $client->api('ThisIsNotAValidClass', null, $client);
    }

    public function testGetKey()
    {
        $client = $this->getClient();
        $this->assertEquals('ourverysecretkey', $client->getKey());
    }

    public function testSetOption()
    {
        $client = $this->getClient();
        $client->setOption('test', 'test');
        $option = $client->getOption('test');
        $this->assertEquals('test', $option);
    }

    public function testSetOptions()
    {
        $client = $this->getClient();
        $client->setOptions(['one' => 'two', 'three' => 'four']);
        $options = $client->getOptions();
        $this->assertEquals(['one' => 'two', 'three' => 'four'], $options);
    }

    public function testBadGetOption()
    {
        $client = $this->getClient();
        $option = $client->getOption('notset');

        $this->assertFalse($option);
    }

    public function testApiEndPoint()
    {
        $client = $this->getClient();
        $url = $client->getApiEndPoint();

        $this->assertEquals('https://api.checkr.com/v1/', $url);
    }

    public function testRequest()
    {
        $responses = [new Response(200, [], '{"id": "57ed4ce3057e0b002adc6d93","object": "adverse_item","text": "License status: Suspended"}')];
        $client = $this->getClient($responses);
        $response = $client->request('GET', $client->getApiEndPoint().'fake_request');
        $this->assertEquals(json_decode('{"id": "57ed4ce3057e0b002adc6d93","object": "adverse_item","text": "License status: Suspended"}'), $response);
    }

    public function testBadRequestException()
    {
        $this->expectException(BadRequest::class);
        $responses = [new Response(400, [])];
        $client = $this->getClient($responses);
        $client->request('GET', $client->getApiEndPoint().'fake_request');
        $this->getClient($responses);
    }

    public function testUnauthorizedException()
    {
        $this->expectException(Unauthorized::class);
        $responses = [new Response(401, [])];
        $client = $this->getClient($responses);
        $client->request('GET', $client->getApiEndPoint().'fake_request');
        $this->getClient($responses);
    }

    public function testForbiddenException()
    {
        $this->expectException(Forbidden::class);
        $responses = [new Response(403, [])];
        $client = $this->getClient($responses);
        $client->request('GET', $client->getApiEndPoint().'fake_request');
        $this->getClient($responses);
    }

    public function testNotFoundException()
    {
        $this->expectException(NotFound::class);
        $responses = [new Response(404, [])];
        $client = $this->getClient($responses);
        $client->request('GET', $client->getApiEndPoint().'fake_request');
        $this->getClient($responses);
    }

    public function testConflictException()
    {
        $this->expectException(Conflict::class);
        $responses = [new Response(409, [])];
        $client = $this->getClient($responses);
        $client->request('GET', $client->getApiEndPoint().'fake_request');
        $this->getClient($responses);
    }

    public function testInternalServerErrorException()
    {
        $this->expectException(InternalServerError::class);
        $responses = [new Response(500, [])];
        $client = $this->getClient($responses);
        $client->request('GET', $client->getApiEndPoint().'fake_request');
        $this->getClient($responses);
    }

    public function testUnhandledRequestErrorException()
    {
        $this->expectException(UnhandledRequestError::class);
        $responses = [new Response(417, [])];
        $client = $this->getClient($responses);
        $client->request('GET', $client->getApiEndPoint().'fake_request');
        $this->getClient($responses);
    }
}
