<?php

namespace Lyal\Checkr\Laravel\Events;

class ContinuousCheckSubscriptionError
{
    public $continuousCheckSubscriptionError;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $continuousCheckSubscriptionError
     */
    public function __construct($continuousCheckSubscriptionError)
    {
        $this->continuousCheckSubscriptionError = $continuousCheckSubscriptionError;
    }
}
