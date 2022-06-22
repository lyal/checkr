<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Creatable;
use Lyal\Checkr\Traits\Deleteable;
use Lyal\Checkr\Traits\Listable;
use Lyal\Checkr\Traits\Saveable;

class Candidate extends AbstractResource
{
    use Creatable, Saveable, Listable, Deleteable;

    /**
     * Candidate constructor.
     *
     * @param null|string|array $values
     * @param null|Client $client
     */
    public function __construct($values = null, $client = null)
    {
        parent::__construct($values, $client);
    }
}
