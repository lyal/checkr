<?php

namespace Lyal\Checkr\Laravel\Events;

class VerificationProcessed
{
    public $verificationProcessed;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $verificationProcessed
     */
    public function __construct($verificationProcessed)
    {
        $this->verificationProcessed = $verificationProcessed;
    }
}
