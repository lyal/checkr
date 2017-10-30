<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;

class Verification extends AbstractResource
{

    /**
     * Verification constructor.
     * @param null|string|array $values
     * @param null|Client $client
     */

    public function __construct($values = null, Client $client = null)
    {
        $this->setFields(
            [
                'id',
                'object',
                'uri',
                'created_at',
                'completed_at',
                'verification_type',
                'verification_url',
            ]
        );

        parent::__construct($values, $client);
    }
}
