<?php
namespace Tests\Unit;

use Lyal\Checkr\Entities\Screenings\SexOffenderSearch;
use Tests\UnitTestCase;

class SexOffenderSearchTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Screenings\SexOffenderSearch', $this->getSexOffenderSearch());
    }

    public function testSetId()
    {
        $sexOffenderSearch = $this->getSexOffenderSearch();
        $sexOffenderSearch->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $sexOffenderSearch->id);
    }

    public function testFields()
    {
        $values = [
            'id' => '539fd88c101897f7cd000008',
            'object' => 'sex_offender_search',
            'uri' => '/v1/sex_offender_searches/539fd88c101897f7cd000008',
            'status' => 'consider',
            'created_at' => '2014-01-18T12:34:00Z',
            'completed_at' => '2014-01-18T12:35:30Z',
            'turnaround_time' => 90,
            'records' => [
                ['registry' => 'California',
                    'full_name' => 'John Alfred Smith',
                    'age' => 44,
                    'dob' => '1971-04-11',
                    'address' => [
                        'street' => '123 S Folsom St',
                        'city' => 'San Francisco',
                        'state' => 'CA',
                        'zipcode' => '94110',
                    ],
                    'race' => 'white',
                    'gender' => 'male',
                    'eye_color' => 'brown',
                    'hair_color' => 'brown',
                    'height' => 70,
                    'weight' => 175,
                    'registration_start' => '2011-02-12',
                    'registration_end' => 'life registration',
                ]
            ]
        ];

        $sexOffenderSearch = $this->getSexOffenderSearch($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $sexOffenderSearch->{$key});
        }

    }

    protected function getSexOffenderSearch($values = NULL)
    {
        return new SexOffenderSearch($values,$this->getClient());
    }
}