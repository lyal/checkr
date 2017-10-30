<?php
namespace Lyal\Checkr\Entities\Resources;


class Subscription extends AbstractResource
{
    public function __construct($values = NULL, $client = NULL)
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
            'candidate_id'
        ]);

        parent::__construct($values, $client);

    }
}