<?php


namespace Tests;


use Lyal\Checkr\Client;

class ApiTestCase extends TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new Client(getenv('checkr_test_key'));
    }

    public function getClient()
    {
        return $this->client;
    }
}