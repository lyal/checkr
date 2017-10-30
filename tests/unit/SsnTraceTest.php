<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Screenings\SsnTrace;
use Tests\UnitTestCase;

class SsnTraceTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Screenings\SsnTrace', $this->getSsnTrace());
    }

    public function testSetId()
    {
        $ssnTrace = $this->getSsnTrace();
        $ssnTrace->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $ssnTrace->id);
    }

    public function testFields()
    {
        $values = [
            'id'              => '539fd88c101897f7cd000001',
            'object'          => 'ssn_trace',
            'uri'             => '/v1/ssn_traces/539fd88c101897f7cd000001',
            'status'          => 'clear',
            'created_at'      => '2014-01-18T12:34:00Z',
            'completed_at'    => '2014-01-18T12:35:30Z',
            'turnaround_time' => 90,
            'ssn'             => 'XXX-XX-4645',
            'addresses'       => [
                [
                    'street'    => '123 S Folsom St',
                    'unit'      => 'Apt 54B',
                    'city'      => 'San Francisco',
                    'state'     => 'CA',
                    'zipcode'   => '94110',
                    'county'    => 'SAN FRANCISCO',
                    'from_date' => '2010-05-01',
                    'to_date'   => '2014-06-01',
                ],
                [
                    'street'    => '1230 5th Avenue',
                    'unit'      => null,
                    'city'      => 'New York',
                    'state'     => 'NY',
                    'zipcode'   => '1005',
                    'county'    => 'NEW YORK',
                    'from_date' => '2007-07-01',
                    'to_date'   => '2010-05-01',
                ],
            ],
            'aliases' => [
                ['first_name'     => 'Jack',
                    'middle_name' => 'B',
                    'last_name'   => 'Fieldman',
                ],
            ],
        ];

        $ssnTrace = $this->getSsnTrace($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $ssnTrace->{$key});
        }
    }

    protected function getSsnTrace($values = null)
    {
        return new SsnTrace($values, $this->getClient());
    }
}
