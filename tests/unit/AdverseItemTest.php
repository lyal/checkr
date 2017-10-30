<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\AdverseItem;
use Tests\UnitTestCase;

class AdverseItemTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\AdverseItem', $this->getAdverseItem());
    }

    public function testSetId()
    {
        $adverseItem = $this->getAdverseItem();
        $adverseItem->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $adverseItem->id);
    }

    public function testFields()
    {
        $values = [
            'id'     => '57ed4ce3057e0b002adc6d93',
            'object' => 'adverse_item',
            'text'   => 'License Status: suspended',
        ];

        $adverseItem = $this->getAdverseItem($values);

        foreach ($values as $key => $value) {
            $this->assertEquals($value, $adverseItem->{$key});
        }
    }

    protected function getAdverseItem($values = null)
    {
        return new AdverseItem($values, $this->getClient());
    }
}
