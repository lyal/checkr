<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Employer;
use Tests\UnitTestCase;

class EmployerTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Employer', $this->getEmployer());
    }

    public function testSetId()
    {
        $employer = $this->getEmployer();
        $employer->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $employer->id);
    }

    public function testFields()
    {
        $values = [
            'id'             => 'ca27df84be5b50dfa7ee1cda',
            'object'         => 'test_candidate_employer',
            'uri'            => '/v1/candidates/e44aa283528e6fde7d542194/employers/ca27df84be5b50dfa7ee1cda',
            'candidate_id'   => 'e44aa283528e6fde7d542194',
            'name'           => 'Checkr',
            'position'       => 'Software Engineer',
            'salary'         => 10000,
            'contract_type'  => 'full_time',
            'do_not_contact' => false,
            'start_date'     => '2016-06-01',
            'employer_url'   => 'www.employer.com',
            'end_date'       => '2017-05-01',
            'address'        => [
                    'street'  => '123 Main St.',
                    'city'    => 'San Francisco',
                    'state'   => 'CA',
                    'zipcode' => '94108',
                    'country' => 'US',
                ],
            'manager' => [
                    'email' => 'joesmith@checkr.com',
                    'name'  => 'Joe Smith',
                    'phone' => '212-555-1234',
                    'title' => 'Engineering Manager',
                ],
        ];

        $employer = $this->getEmployer($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $employer->{$key});
        }
    }

    protected function getEmployer($values = null)
    {
        return new Employer($values, $this->getClient());
    }
}
