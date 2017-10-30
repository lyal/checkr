<?php
namespace Lyal\Checkr\Entities\Resources;


class Package extends AbstractResource
{
    public function __construct($values = NULL, $client = NULL)
    {
        $this->setFields(
            [
                'id',
                'object',
                'uri',
                'created_at',
                'name',
                'slug',
                'price',
                'screenings'
            ]
        );
        parent::__construct($values, $client);
    }
}