<?php
namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Traits\Creatable;
use Lyal\Checkr\Traits\Deleteable;
use Lyal\Checkr\Traits\Listable;
use Lyal\Checkr\Traits\Saveable;

class Candidate extends AbstractResource
{
    use Creatable, Saveable, Listable, Deleteable;

    public function __construct($values = NULL, $client = NULL)
    {
        $this->setFields([
            'id',
            'object',
            'uri',
            'created_at',
            'first_name',
            'middle_name',
            'no_middle_name',
            'last_name',
            'mother_maiden_name',
            'email',
            'phone',
            'zipcode',
            'dob',
            'ssn',
            'driver_license_number',
            'driver_license_state',
            'previous_driver_license_number',
            'previous_driver_license_state',
            'copy_requested',
            'custom_id',
            'report_ids',
            'geo_ids',
            'document_ids',
            'adjudication',
            'candidate_id'
        ]);

        parent::__construct($values, $client);

    }
}
