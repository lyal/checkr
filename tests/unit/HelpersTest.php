<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\AdverseAction;
use Lyal\Checkr\Entities\Screenings\SsnTrace;
use Tests\UnitTestCase;

class HelpersTest extends UnitTestCase
{
    public function testStrReplaceToken()
    {
        $url = 'http://www.pullrequest.com/:id';
        $tokens = ['id' => 'hi'];
        $generatedUrl = str_replace_tokens($url, $tokens);

        $this->assertSame('http://www.pullrequest.com/hi', $generatedUrl);
    }

    public function testResourceOrScreeningValidClassName()
    {
        $screening = $this->getScreening();
        $resource = $this->getResource();

        $screeningName = checkrEntityClassName('ssn_trace');
        $resourceName = checkrEntityClassName('adverse_actions');

        $this->assertSame('\\'.get_class($screening), $screeningName);
        $this->assertSame('\\'.get_class($resource), $resourceName);
    }

    public function testResourceOrScreeningInvalidClassName()
    {
        // Check for the existence of a random unique id class
        $object = checkrEntityClassName(uniqid('', false));
        $this->assertFalse($object);
    }

    private function getScreening(array $values = [])
    {
        return new SsnTrace($values, $this->getClient());
    }

    private function getResource(array $values = [])
    {
        return new AdverseAction($values, $this->getClient());
    }
}
