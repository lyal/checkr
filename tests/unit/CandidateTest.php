<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Candidate;
use Tests\UnitTestCase;

class CandidateTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Candidate', $this->getCandidate());
    }

    public function testSetId()
    {
        $candidate = $this->getCandidate();
        $candidate->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $candidate->id);
    }

    public function testFields()
    {
        $values = [
            'id' => 'e44aa283528e6fde7d542194',
            'object' => 'candidate',
            'uri' => '/v1/candidates/e44aa283528e6fde7d542194',
            'created_at' => '2014-01-18T12:34:00Z',
            'updated_at' => '2014-01-19T12:34:00Z',
            'first_name' => 'John',
            'middle_name' => 'Alfred',
            'no_middle_name' => false,
            'last_name' => 'Smith',
            'mother_maiden_name' => null,
            'email' => 'john.smith@gmail.com',
            'phone' => '5555555555',
            'zipcode' => '90401',
            'dob' => '1970-01-22',
            'ssn' => 'XXX-XX-4645',
            'driver_license_number' => 'F211165',
            'driver_license_state' => 'CA',
            'previous_driver_license_number' => 'F1501739',
            'previous_driver_license_state' => 'CA',
            'copy_requested' => false,
            'custom_id' => null,
            'report_ids' => [
                '532e71cfe88a1d4e8d00000d',
            ],
            'geo_ids' => [
                '79f943e212cce7de21c054a8',
                '7299c2c22ebb19abb0688a6c',
            ],
            'document_ids' => [
            ],
        ];

        $candidate = $this->getCandidate($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $candidate->{$key});
        }
    }

    protected function getCandidate($values = null)
    {
        return new Candidate($values, $this->getClient());
    }
}
