<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Screenings\StateCriminalSearch;
use Tests\UnitTestCase;

class StateCriminalSearchTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Screenings\StateCriminalSearch', $this->getStateCriminalSearch());
    }

    public function testSetId()
    {
        $stateCriminalSearch = $this->getStateCriminalSearch();
        $stateCriminalSearch->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $stateCriminalSearch->id);
    }

    public function testFields()
    {
        $values = [
            'id'              => '539fdcf335644a0ef4000001',
            'object'          => 'state_criminal_search',
            'uri'             => '/v1/state_criminal_searches/539fdcf335644a0ef4000001',
            'status'          => 'consider',
            'created_at'      => '2014-01-18T12:34:00Z',
            'completed_at'    => '2014-01-18T12:35:30Z',
            'turnaround_time' => 100800,
            'state'           => 'CA',
            'records'         => [
                [
                    'case_number'        => '24323-DA',
                    'file_date'          => '2010-02-18',
                    'arresting_agency'   => 'San Francisco Police Department',
                    'court_jurisdiction' => 'San Francisco',
                    'court_of_record'    => null,
                    'dob'                => '1970-01-22',
                    'full_name'          => 'John Alfred Smith',
                    'charges'            => [
                        ['charge'              => 'Sell Cocaine',
                            'charge_type'      => null,
                            'charge_id'        => null,
                            'classification'   => 'Felony',
                            'deposition'       => null,
                            'defendant'        => 'John Alfred Smith',
                            'plaintiff'        => null,
                            'sentence'         => 'Active Punishment Minimum: 10M',
                            'disposition'      => 'Guilty',
                            'probation_status' => null,
                            'offense_date'     => '2011-04-22',
                            'deposition_date'  => '2014-05-27',
                            'arrest_date'      => '2011-04-22',
                            'charge_date'      => null,
                            'sentence_date'    => '2011-06-02',
                            'disposition_date' => '2011-06-02',
                        ],

                    ],
                ],
            ],
        ];

        $stateCriminalSearch = $this->getStateCriminalSearch($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $stateCriminalSearch->{$key});
        }
    }

    protected function getStateCriminalSearch($values = null)
    {
        return new StateCriminalSearch($values, $this->getClient());
    }
}
