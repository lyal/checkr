<?php
namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Report;
use Tests\UnitTestCase;

class ReportTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Report', $this->getReport());
    }

    public function testSetId()
    {
        $report = $this->getReport();
        $report->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194',$report->id);
    }

    public function testFields()
    {
        $values = [
            'id' => '4722c07dd9a10c3985ae432a',
            'object' => 'report',
            'uri' => '/v1/reports/4722c07dd9a10c3985ae432a',
            'status' => 'clear',
            'created_at' => '2014-01-18T12:34:00Z',
            'completed_at' => '2014-01-18T12:35:30Z',
            'revised_at' => NULL,
            'turnaround_time' => 90,
            'due_time' => '2014-01-19T11:28:31Z',
            'adjudication' => 'engaged',
            'package' => 'driver_pro',
            'candidate_id' => 'e44aa283528e6fde7d542194',
            'ssn_trace_id' => '539fd88c101897f7cd000001',
            'sex_offender_search_id' => '539fd88c101897f7cd000008',
            'national_criminal_search_id' => '539fd88c101897f7cd000006',
            'county_criminal_search_ids' => [
                '539fdcf335644a0ef4000001',
                '532e71cfe88a1d4e8d00000c',
            ],
            'motor_vehicle_report_id' => '539fd88c101897f7cd000007',
            'state_criminal_search_ids' =>
                [
                    '539fdcf335644a0ef4000003',
                    '532e71cfe88a1d4e8d000004',
                ],
            'document_ids' => [],
            'geo_ids' =>
                [
                    '87f5bb4983eade22c55f4731',
                ],
            'program_id' => '00166f9ff39ec7b453adfaec',
        ];

        $report = $this->getReport($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $report->{$key});
        }

    }

    protected function getReport($values = NULL)
    {
        return new Report($values,$this->getClient());
    }
}