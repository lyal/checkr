<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Traits\Deleteable;

class Geo extends AbstractResource
{
    use Deleteable;

    public function __construct($values = null, $client = null)
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
