<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Screenings\EducationVerification;
use Tests\UnitTestCase;

class EducationVerificationTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Screenings\EducationVerification', $this->getEducationVerification());
    }

    public function testSetId()
    {
        $educationVerification = $this->getEducationVerification();
        $educationVerification->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $educationVerification->id);
    }

    public function testFields()
    {
        $values = [
            'id'           => '595511af261066005170f471',
            'object'       => 'education_verification',
            'uri'          => '/v1/education_verifications/595511af261066005170f471',
            'completed_at' => '2017-07-06T14:15:27Z',
            'created_at'   => '2017-06-29T14:41:51Z',
            'records'      => [
                'id'     => '592311d2113adf7e9c9f66b8',
                'result' => [
                    'degree' => [
                        'verified' => false,
                    ],
                ],
                'school' => [
                    'candidate_id' => '762781cdd1c7fd620e956583',
                    'id'           => '95a95172bb81143ed44e403c',
                    'uri'          => '/v1/candidates/762781cdd1c7fd620e956583/schools/95a95172bb81143ed44e403c',
                    'name'         => 'College University',
                    'address'      => [
                            'street'  => '1 Circle Avenue',
                            'city'    => 'San Francisco',
                            'zipcode' => '94105',
                            'state'   => 'CA',
                            'country' => 'US',
                        ],
                    'degree'       => 'MS',
                    'year_awarded' => 2017,
                    'major'        => 'Computer Science',
                    'phone'        => '415-111-1111',
                    'minor'        => 'Background Checks',
                    'start_date'   => '2013-08-25',
                    'end_date'     => '2017-05-10',
                    'current'      => false,
                    'object'       => 'candidate_school',
                    'events'       => [
                        [
                            'text'       => 'started',
                            'created_at' => '2017-06-29T14:42:47Z',
                            'type'       => 'verification_start',
                        ],
                    ],
                    'status' => 'consider',
                ],
            ],
            'status'          => 'consider',
            'turnaround_time' => 603216,
        ];

        $educationVerification = $this->getEducationVerification($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }
            $this->assertEquals($value, $educationVerification->{$key});
        }
    }

    protected function getEducationVerification($values = null)
    {
        return new EducationVerification($values, $this->getClient());
    }
}
