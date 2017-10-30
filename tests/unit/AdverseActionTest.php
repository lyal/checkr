<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\AdverseAction;
use Tests\UnitTestCase;

class AdverseActionTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\AdverseAction', $this->getAdverseAction());
    }

    public function testSetId()
    {
        $adverseAction = $this->getAdverseAction();
        $adverseAction->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $adverseAction->id);
    }

    public function testFields()
    {
        $values = [
            'id'                       => '57ed51e57619e8002a6683f2',
            'object'                   => 'adverse_action',
            'uri'                      => '/v1/adverse_actions/57ed51e57619e8002a6683f2',
            'created_at'               => '2016-09-29T17:39:49Z',
            'status'                   => 'pending',
            'report_id'                => 'b861a56db1b1b89692dd6118',
            'post_notice_scheduled_at' => '2016-10-07T12:34:00Z',
            'post_notice_ready_at'     => '2016-10-06T17:39:48Z',
            'canceled_at'              => null,
            'adverse_items'            => collect([
                    [
                        'id'     => '57ed4ce3057e0b002adc6d90',
                        'object' => 'adverse_item',
                        'text'   => 'CHARGE: DELIVER COCAINE (STATUTE: 90-95(A)(1)) (DISPOSITION: DISMISSAL W/O LEAVE)',
                    ],
                    ['id'        => '57ed4ce3057e0b002adc6d91',
                        'object' => 'adverse_item',
                        'text'   => 'CHARGE: RESISTING PUBLIC OFFICER (STATUTE: 14-223) (DISPOSITION: DISMISSAL W/O LEAVE)',
                    ],
                ]),
        ];

        $adverseAction = $this->getAdverseAction($values);

        foreach ($values as $key => $value) {
            $this->assertEquals($value, $adverseAction->{$key});
        }
    }

    protected function getAdverseAction($values = null)
    {
        return new AdverseAction($values, $this->getClient());
    }
}
