<?php
namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Package;
use Tests\UnitTestCase;

class PackageTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Package', $this->getPackage());
    }

    public function testSetId()
    {
        $package = $this->getPackage();
        $package->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $package->id);
    }

    public function testFields()
    {
        $values = [
            'id' => 'e44aa283528e6fde7d542194',
            'object' => 'package',
            'uri' => '/v1/packages/e44aa283528e6fde7d542194',
            'created_at' => '2014-01-18T12:34:00Z',
            'name' => 'Criminal Pro',
            'slug' => 'criminal_pro',
            'price' => 6500,
            'screenings' =>
                [
                    [
                        'type' => 'ssn_trace',
                        'subtype' => NULL,
                    ],
                    [
                        'type' => 'county_criminal_search',
                        'subtype' => '7years',

                    ]
                ]
        ];

        $package = $this->getPackage($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $package->{$key});
        }

    }

    protected function getPackage($values = NULL)
    {
        return new Package($values,$this->getClient());
    }
}