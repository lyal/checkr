<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Geo;
use Tests\UnitTestCase;

class GeoTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Geo', $this->getGeo());
    }

    public function testSetId()
    {
        $geo = $this->getGeo();
        $geo->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $geo->id);
    }

    public function testFields()
    {
        $values = [
            'id'         => 'e44aa283528e6fde7d542194',
            'object'     => 'geo',
            'uri'        => '/v1/geos/e44aa283528e6fde7d542194',
            'created_at' => '2015-01-18T12:34:00Z',
            'name'       => 'San Francisco',
            'state'      => 'CA',
            'deleted_at' => null,
        ];

        $geo = $this->getGeo($values);

        foreach ($values as $key => $value) {
            $this->assertEquals($value, $geo->{$key});
        }
    }

    protected function getGeo($values = null)
    {
        return new Geo($values, $this->getClient());
    }
}
