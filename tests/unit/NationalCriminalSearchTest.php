<?php
namespace Tests\Unit;

use Lyal\Checkr\Entities\Screenings\NationalCriminalSearch;
use Tests\UnitTestCase;

class NationalCriminalSearchTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Screenings\NationalCriminalSearch', $this->getNationalCriminalSearch());
    }

    public function testSetId()
    {
        $nationalCriminalSearch = $this->getNationalCriminalSearch();
        $nationalCriminalSearch->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $nationalCriminalSearch->id);
    }

    public function testFields()
    {
        $values = [
            'id' => '539fd88c101897f7cd000006',
            'object' => 'national_criminal_search',
            'uri' => '/v1/national_criminal_searches/539fd88c101897f7cd000006',
            'status' => 'clear',
            'created_at' => '2014-01-18T12:34:00Z',
            'completed_at' => '2014-01-18T12:35:30Z',
            'turnaround_time' => 90,
            'records' => [
                ['case_number' => '24323-DA',
                    'file_date' => NULL,
                    'arresting_agency' => NULL,
                    'court_jurisdiction' => NULL,
                    'court_of_record' => NULL,
                    'dob' => '1970-01-22',
                    'full_name' => 'John Alfred Smith',
                    'charges' => []
                ]
            ]
        ];

        $nationalCriminalSearch = $this->getNationalCriminalSearch($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $nationalCriminalSearch->{$key});
        }

    }

    protected function getNationalCriminalSearch($values = NULL)
    {
        return new NationalCriminalSearch($values,$this->getClient());
    }
}