<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Deleteable;

class Geo extends AbstractResource
{
    use Deleteable;

    /**
     * Geo constructor.
     *
     * @param null|string|array $values
     * @param null|Client       $client
     */
    public function __construct($values = null, Client $client = null)
    {
        $this->setFields([
            'id',
            'object',
            'uri',
            'created_at',
            'name',
            'state',
            'deleted_at',
        ]);

        $this->setHidden([
            'candidate_id',
            'report_id',
        ]);

        parent::__construct($values, $client);
    }
}
