<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Subscription;
use Tests\UnitTestCase;

class SubscriptionTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Subscription', $this->getSubscription());
    }

    public function testSetId()
    {
        $subscription = $this->getSubscription();
        $subscription->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $subscription->id);
    }

    public function testFields()
    {
        $values = [
            'id'             => '4722c07dd9a10c3985ae432a',
            'object'         => 'subscription',
            'uri'            => '/v1/subscriptions/4722c07dd9a10c3985ae432a',
            'status'         => 'active',
            'created_at'     => '2014-01-18T12:34:00Z',
            'canceled_at'    => null,
            'package'        => 'driver_pro',
            'interval_count' => 1,
            'interval_unit'  => 'month',
            'start_date'     => '2014-06-10',
            'candidate_id'   => 'e44aa283528e6fde7d542194',
        ];

        $subscription = $this->getSubscription($values);

        foreach ($values as $key => $value) {
            $this->assertEquals($value, $subscription->{$key});
        }
    }

    protected function getSubscription($values = null)
    {
        return new Subscription($values, $this->getClient());
    }
}
