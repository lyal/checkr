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
            'id' => '539fd88c101897f7cd000007',
            'object' => 'motor_vehicle_report',
            'uri' => '/v1/motor_vehicle_reports/539fd88c101897f7cd000007',
            'status' => 'consider',
            'created_at' => '2014-01-18T12:34:00Z',
            'completed_at' => '2014-01-18T12:35:30Z',
            'turnaround_time' => 90,
            'full_name' => 'John Alfred Smith',
            'license_number' => 'F2111132',
            'license_state' => 'CA',
            'license_status' => 'valid',
            'license_type' => 'non-commercial',
            'license_class' => 'C',
            'expiration_date' => '2016-07-24',
            'issued_date' => '2006-12-03',
            'first_issued_date' => '2000-01-14',
            'inferred_issued_date' => NULL,
            'restrictions' => [],
            'accidents' => [
                [
                    'accident_date' => '2009-04-12',
                    'description' => 'property damage',
                    'city' => NULL,
                    'county' => 'SAN FRANCISCO',
                    'state' => NULL,
                    'order_number' => '33-435932',
                    'points' => NULL,
                    'vehicle_speed' => NULL,
                    'reinstatement_date' => NULL,
                    'action_taken' => 'police report filed',
                    'ticket_number' => NULL,
                    'enforcing_agency' => 'San Francisco PD',
                    'jurisdiction' => NULL,
                    'severity' => NULL,
                    'violation_number' => NULL,
                    'license_plate' => '6UM6938',
                    'fine_amount' => NULL,
                    'state_code' => NULL,
                    'acd_code' => NULL,
                    'injury_accident' => false,
                    'fatality_accident' => false,
                    'fatality_count' => 0,
                    'injury_count' => 0,
                    'vehicles_involved_count' => 1,
                    'report_number' => NULL,
                    'policy_number' => NULL,
                ]
            ],
            'violations' => [
                [
                    'type' => 'conviction',
                    'issued_date' => '2011-11-14',
                    'conviction_date' => '2010-04-11',
                    'description' => 'speeding 15-19 mph',
                    'points' => 0,
                    'city' => NULL,
                    'county' => 'SANTA CLARA',
                    'state' => 'California',
                    'ticket_number' => '2D55555',
                    'disposition' => NULL,
                    'category' => NULL,
                    'court_name' => NULL,
                    'acd_code' => NULL,
                    'state_code' => NULL,
                    'docket' => NULL,
                ]
            ]
        ];

        $motorVehicleReport = $this->getMotorVehicleReport($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $motorVehicleReport->{$key});
        }

    }

    protected function getMotorVehicleReport($values = NULL)
    {
        return new MotorVehicleReport($values,$this->getClient());
    }
}