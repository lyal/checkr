<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Listable;

class Program extends AbstractResource
{
    use Listable;

    /**
     * Program constructor.
     * @param null|string|array $values
     * @param null|Client $client
     */


    public function __construct($values = null, Client $client = null)
    {
        $this->setFields([
            'id',
            'uri',
            'object',
            'name',
            'created_at',
            'deleted_at',
            'package_ids',
            'geo_ids',
        ]);
        parent::__construct($values, $client);
    }
}
