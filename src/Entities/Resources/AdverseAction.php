<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Creatable;
use Lyal\Checkr\Traits\Deleteable;
use Lyal\Checkr\Traits\Listable;

class AdverseAction extends AbstractResource
{
    use Creatable, Listable, Deleteable;

    /**
     * AdverseAction constructor.
     *
     * @param null|string|array $values
     * @param null|Client $client
     */
    public function __construct($values = null, Client $client = null)
    {
        $this->setCreatePath('reports/:report_id/adverse_actions');
        $this->setDeletePath('reports/:report_id/adverse_actions');

        parent::__construct($values, $client);
    }
}
