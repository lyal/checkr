<?php
namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Traits\Listable;

class Program extends AbstractResource
{
    use Listable;

    public function __construct($values = NULL, $client = NULL)
    {
        $this->setFields([
            'id',
            'uri',
            'object',
            'name',
            'created_at',
            'deleted_at',
            'package_ids',
            'geo_ids'
        ]);
        parent::__construct($values, $client);

    }
}