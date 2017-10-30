<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Screenings\GlobalWatchlistSearch;
use Tests\UnitTestCase;

class GlobalWatchListSearchTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Screenings\GlobalWatchListSearch', $this->getGlobalWatchListSearch());
    }

    public function testSetId()
    {
        $globalWatchListSearch = $this->getGlobalWatchListSearch();
        $globalWatchListSearch->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $globalWatchListSearch->id);
    }

    public function testFields()
    {
        $values = [
            'id'              => '539fd88c101897f7cd000008',
            'object'          => 'global_watchlist_search',
            'uri'             => '/v1/global_watchlist_searches/539fd88c101897f7cd000008',
            'status'          => 'consider',
            'created_at'      => '2014-01-18T12:34:00Z',
            'completed_at'    => '2014-01-18T12:35:30Z',
            'turnaround_time' => 90,
            'records'         => [
                [
                    'case_number'        => '24323-DA',
                    'file_date'          => null,
                    'arresting_agency'   => 'DEA Boston Division',
                    'court_jurisdiction' => null,
                    'court_of_record'    => null,
                    'dob'                => '1970-01-22',
                    'full_name'          => 'John Alfred Smith',
                    'charges'            => [
                        [
                            'charge'           => 'RICO murder',
                            'charge_type'      => null,
                            'charge_id'        => null,
                            'classification'   => 'Felony',
                            'deposition'       => null,
                            'defendant'        => null,
                            'plaintiff'        => null,
                            'sentence'         => 'Active Punishment Minimum: 10Y',
                            'disposition'      => 'Guilty',
                            'probation_status' => null,
                            'offense_date'     => '2011-04-22',
                            'deposition_date'  => '2014-05-27',
                            'arrest_date'      => null,
                            'charge_date'      => null,
                            'sentence_date'    => null,
                            'disposition_date' => '2011-06-02',
                        ],
                    ],
                ],
            ],
        ];
        $globalWatchListSearch = $this->getGlobalWatchListSearch($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $globalWatchListSearch->{$key});
        }
    }

    protected function getGlobalWatchListSearch($values = null)
    {
        return new GlobalWatchlistSearch($values, $this->getClient());
    }
}
