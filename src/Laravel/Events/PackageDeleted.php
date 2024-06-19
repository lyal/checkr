<?php

namespace Lyal\Checkr\Laravel\Events;

class PackageDeleted
{
    public $packageDeleted;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $packageDeleted
     */
    public function __construct($packageDeleted)
    {
        $this->packageDeleted = $packageDeleted;
    }
}
