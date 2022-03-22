<?php

namespace Lyal\Checkr\Laravel\Events;

class PackageCreated
{
    public $packageCreated;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $packageCreated
     */
    public function __construct($packageCreated)
    {
        $this->packageCreated = $packageCreated;
    }
}
