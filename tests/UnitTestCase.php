<?php

namespace Tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Lyal\Checkr\Client;

class UnitTestCase extends TestCase
{
    public function mockGuzzle(array $responses)
    {
        $mock = new MockHandler($responses);
        $handler = HandlerStack::create($mock);

        return new GuzzleClient(['handler' => $handler]);
    }

    public function getClient($responses = [])
    {
        return new Client('ourverysecretkey', [], $this->mockGuzzle($responses));
    }
}
