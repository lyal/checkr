<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Creatable;
use Lyal\Checkr\Traits\Deleteable;
use Lyal\Checkr\Traits\Listable;

class Invitation extends AbstractResource
{
    use Listable, Creatable, Deleteable;

    /**
     * Invitation constructor.
     *
     * @param array|null $values
     * @param Client|null $client
     */
    public function __construct($values = null, Client $client = null)
    {
        parent::__construct($values, $client);
    }
}
