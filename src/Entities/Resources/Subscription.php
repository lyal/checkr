<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;

class Subscription extends AbstractResource
{

    /**
     * Subscription constructor.
     * @param null|string|array $values
     * @param null|Client $client
     */

    public function __construct($values = null, Client $client = null)
    {
        $this->setFields([
            'id',
            'object',
            'uri',
            'status',
            'values',
            'created_at',
            'canceled_at',
            'package',
            'interval_count',
            'interval_unit',
            'start_date',
            'candidate_id',
        ]);

        parent::__construct($values, $client);
    }
}
