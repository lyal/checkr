<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\School;
use Tests\UnitTestCase;

class SchoolTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\School', $this->getSchool());
    }

    public function testSetId()
    {
        $school = $this->getSchool();
        $school->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $school->id);
    }

    public function testFields()
    {
        $values = [
            'id'           => '95a95172bb81143ed44e403c',
            'object'       => 'candidate_school',
            'uri'          => '/v1/candidates/762781cdd1c7fd620e956583/schools/95a95172bb81143ed44e403c',
            'candidate_id' => '762781cdd1c7fd620e956583',
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
            'school_url'   => 'www.collegeuniversity.com',
        ];

        $school = $this->getSchool($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $school->{$key});
        }
    }

    protected function getSchool($values = null)
    {
        return new School($values, $this->getClient());
    }
}
