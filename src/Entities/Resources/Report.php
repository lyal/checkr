<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Creatable;
use Lyal\Checkr\Traits\Saveable;

class Report extends AbstractResource
{
    use Creatable, Saveable;

    /**
     * Report constructor.
     *
     * @param null|string|array $values
     * @param null|Client $client
     */
    public function __construct($values = null, Client $client = null)
    {
        parent::__construct($values, $client);
    }
}
