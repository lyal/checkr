<?php

namespace Lyal\Checkr\Entities\Screenings;

use Lyal\Checkr\Client;
use Lyal\Checkr\Entities\AbstractEntity;

abstract class AbstractScreening extends AbstractEntity
{
    public function __construct($values, Client $client)
    {
        $this->checkFields = false;
        parent::__construct($values, $client);
    }
}
