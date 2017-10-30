<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Listable;

class AdverseItem extends AbstractResource
{
    use Listable;

    /**
     * AdverseItem constructor.
     *
     * @param null|string|array $values
     * @param null|Client $client
     */
    public function __construct($values = null, Client $client = null)
    {
        $this->setFields([
            'id',
            'object',
            'text',
        ]);

        $this->setListPath('reports/:report_id/adverse_items');

        parent::__construct($values, $client);
    }
}
