<?php

namespace Lyal\Checkr\Entities\Screenings;

use Lyal\Checkr\Client;
use Lyal\Checkr\Entities\AbstractEntity;

abstract class AbstractScreening extends AbstractEntity
{
    /**
     * AbstractScreening constructor.
     *
     * @param array|null|string $values
     * @param Client|null       $client
     */
    public function __construct($values = null, Client $client = null)
    {
        $this->checkFields = false;
        parent::__construct($values, $client);
    }
}
