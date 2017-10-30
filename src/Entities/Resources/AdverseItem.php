<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Traits\Listable;

class AdverseItem extends AbstractResource
{
    use Listable;

    /**
     * AdverseItem constructor.
     *
     * @param null $values
     * @param null $client
     */
    public function __construct($values = null, $client = null)
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
