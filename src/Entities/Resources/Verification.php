<?php
namespace Lyal\Checkr\Entities\Resources;


class Verification extends AbstractResource
{
    public function __construct($values = NULL, $client = NULL)
    {

        $this->setFields(
            [
                'id',
                'object',
                'uri',
                'created_at',
                'completed_at',
                'verification_type',
                'verification_url'
            ]
        );

        parent::__construct($values, $client);

    }

}