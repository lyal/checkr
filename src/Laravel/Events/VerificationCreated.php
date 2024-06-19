<?php

namespace Lyal\Checkr\Laravel\Events;

class VerificationCreated
{
    public $verificationCreated;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $verificationCreated
     */
    public function __construct($verificationCreated)
    {
        $this->verificationCreated = $verificationCreated;
    }
}
