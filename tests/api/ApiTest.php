<?php

namespace Tests\Api;

use Lyal\Checkr\Entities\Resources\Candidate;
use Lyal\Checkr\Exceptions\Client\BadRequest;
use Tests\ApiTestCase;

class ApiTest extends ApiTestCase
{
    private $candidate;

    public function setup()
    {
        parent::setUp();
        $this->candidate = $this->getClient()->candidate([
            'first_name'  => 'John',
            'middle_name' => 'James',
            'last_name'   => 'Allen',
            'ssn'         => '111-11-2002',
            'dob'         => '1980-01-01',
            'zipcode'     => '90210',
            'email'       => 'bademail@bademail.com', ])->create();
    }

    public function testBadRequest()
    {
        $this->expectException(BadRequest::class);
        $this->candidate->invitation()->create();
    }

    public function testFlow()
    {
        $invitation = $this->candidate->invitation(['package' => 'tasker_pro'])->create();
        $this->assertTrue(isset($invitation->id));
        $deleted = $invitation->delete();
        $this->assertInstanceOf(get_class($this->getClient()), $deleted);
        $report = $this->candidate->report(['package' => 'tasker_pro'])->create();
        $report = $report->embed('candidate,ssn_trace,county_criminal_searches ')->load();
        $this->assertEquals('John', $report->candidate->first_name);
    }

    public function testListAllCandidates()
    {
        $candidates = $this->getClient()->candidate()->all();
        $this->assertInstanceOf(Candidate::class, $candidates->first());
    }
}
