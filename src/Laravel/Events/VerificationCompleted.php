<?php

namespace Lyal\Checkr\Laravel\Events;

class VerificationCompleted
{
    public $verificationCompleted;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $verificationCompleted
     */
    public function __construct($verificationCompleted)
    {
        $this->verificationCompleted = $verificationCompleted;
    }
}
