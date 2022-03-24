<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Entities\AbstractEntity;
use Lyal\Checkr\Traits\Postable;

abstract class AbstractResource extends AbstractEntity
{
    use Postable;

    /**
     * Resources to expand on requests to Checkr.
     *
     * See https://docs.checkr.com/#embedding
     *
     * @var
     */
    private $embeddedResources;

    /**
     * AbstractResource constructor.
     *
     * @param null|string|array $values
     * @param Client|null       $client
     */
    public function __construct($values = null, Client $client = null)
    {
        parent::__construct($values, $client);
    }

    /**
     * Add items to resource.
     *
     * Can either be a single resource name, a csv list, or
     * an array
     *
     * @param $embedResources
     *
     * @return $this
     */
    public function embed($embedResources)
    {
        if (is_array($embedResources)) {
            $embedResources = implode(',', $embedResources);
        }
        $this->embeddedResources = $embedResources;

        return $this;
    }

    /**
     * @return bool
     */
    public function getEmbeddedResources()
    {
        if ($this->embeddedResources) {
            return $this->embeddedResources;
        }

        return false;
    }
}
