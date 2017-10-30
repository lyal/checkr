<?php
namespace Lyal\Checkr\Entities\Resources;


use Lyal\Checkr\Traits\Creatable;
use Lyal\Checkr\Traits\Deleteable;
use Lyal\Checkr\Traits\Listable;

class Invitation extends AbstractResource
{
    use Listable, Creatable, Deleteable;

    public function __construct($values = NULL, $client = NULL)
    {
        $this->setFields([
            'id',
            'object',
            'uri',
            'invitation_url',
            'status',
            'created_at',
            'expires_at',
            'deleted_at',
            'completed_at',
            'package',
            'candidate_id'
        ]);
        parent::__construct($values, $client);

    }
}