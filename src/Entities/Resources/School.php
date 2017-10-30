<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Creatable;
use Lyal\Checkr\Traits\Deleteable;
use Lyal\Checkr\Traits\Listable;

class School extends AbstractResource
{
    use Listable, Creatable, Deleteable;

    /**
     * School constructor.
     *
     * @param null|string|array $values
     * @param null|Client $client
     */
    public function __construct($values = null, Client $client = null)
    {
        $this->setFields([
            'id', 'object', 'uri', 'name', 'degree', 'year_awarded', 'major', 'phone', 'minor', 'start_date', 'end_date', 'current', 'school_url', 'address', 'candidate_id',
        ]);

        $this->setLoadPath('candidates/:candidate_id/schools/:id');
        $this->setCreatePath('candidates/:candidate_id/schools');
        $this->setListPath('candidates/:candidate_id/schools');
        $this->setDeletePath('candidates/:candidate_id/employers/:id');

        parent::__construct($values, $client);
    }
}
