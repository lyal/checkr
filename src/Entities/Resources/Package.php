<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;

class Package extends AbstractResource
{
    /**
     * Package constructor.
     *
     * @param null|string|array $values
     * @param null|Client $client
     */
    public function __construct($values = null, Client $client = null)
    {
        parent::__construct($values, $client);
    }
}
