<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Screenings\MotorVehicleReport;
use Tests\UnitTestCase;

class MotorVehicleReportTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Screenings\MotorVehicleReport', $this->getMotorVehicleReport());
    }

    public function testSetId()
    {
        $motorVehicleReport = $this->getMotorVehicleReport();
        $motorVehicleReport->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $motorVehicleReport->id);
    }

    public function testFields()
    {
        $values = [
            'id'                   => '539fd88c101897f7cd000007',
            'object'               => 'motor_vehicle_report',
            'uri'                  => '/v1/motor_vehicle_reports/539fd88c101897f7cd000007',
            'status'               => 'consider',
            'created_at'           => '2014-01-18T12:34:00Z',
            'completed_at'         => '2014-01-18T12:35:30Z',
            'turnaround_time'      => 90,
            'full_name'            => 'John Alfred Smith',
            'license_number'       => 'F2111132',
            'license_state'        => 'CA',
            'license_status'       => 'valid',
            'license_type'         => 'non-commercial',
            'license_class'        => 'C',
            'expiration_date'      => '2016-07-24',
            'issued_date'          => '2006-12-03',
            'first_issued_date'    => '2000-01-14',
            'inferred_issued_date' => null,
            'restrictions'         => [],
            'accidents'            => [
                [
                    'accident_date'           => '2009-04-12',
                    'description'             => 'property damage',
                    'city'                    => null,
                    'county'                  => 'SAN FRANCISCO',
                    'state'                   => null,
                    'order_number'            => '33-435932',
                    'points'                  => null,
                    'vehicle_speed'           => null,
                    'reinstatement_date'      => null,
                    'action_taken'            => 'police report filed',
                    'ticket_number'           => null,
                    'enforcing_agency'        => 'San Francisco PD',
                    'jurisdiction'            => null,
                    'severity'                => null,
                    'violation_number'        => null,
                    'license_plate'           => '6UM6938',
                    'fine_amount'             => null,
                    'state_code'              => null,
                    'acd_code'                => null,
                    'injury_accident'         => false,
                    'fatality_accident'       => false,
                    'fatality_count'          => 0,
                    'injury_count'            => 0,
                    'vehicles_involved_count' => 1,
                    'report_number'           => null,
                    'policy_number'           => null,
                ],
            ],
            'violations' => [
                [
                    'type'            => 'conviction',
                    'issued_date'     => '2011-11-14',
                    'conviction_date' => '2010-04-11',
                    'description'     => 'speeding 15-19 mph',
                    'points'          => 0,
                    'city'            => null,
                    'county'          => 'SANTA CLARA',
                    'state'           => 'California',
                    'ticket_number'   => '2D55555',
                    'disposition'     => null,
                    'category'        => null,
                    'court_name'      => null,
                    'acd_code'        => null,
                    'state_code'      => null,
                    'docket'          => null,
                ],
            ],
        ];

        $motorVehicleReport = $this->getMotorVehicleReport($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $motorVehicleReport->{$key});
        }
    }

    protected function getMotorVehicleReport($values = null)
    {
        return new MotorVehicleReport($values, $this->getClient());
    }
}
