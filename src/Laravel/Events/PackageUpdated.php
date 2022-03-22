<?php

namespace Lyal\Checkr\Laravel\Events;

class PackageUpdated
{
    public $packageUpdated;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $packageUpdated
     */
    public function __construct($packageUpdated)
    {
        $this->packageUpdated = $packageUpdated;
    }
}
