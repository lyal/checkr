<?php

namespace Lyal\Checkr\Entities\Resources;

class Package extends AbstractResource
{
    public function __construct($values = null, $client = null)
    {
        $this->setFields(
            [
                'id',
                'object',
                'uri',
                'created_at',
                'name',
                'slug',
                'price',
                'screenings',
            ]
        );
        parent::__construct($values, $client);
    }
}
