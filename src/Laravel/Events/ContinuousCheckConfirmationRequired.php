<?php

namespace Lyal\Checkr\Laravel\Events;

class ContinuousCheckConfirmationRequired
{
    public $continuousCheckConfirmationRequired;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $continuousCheckConfirmationRequired
     */
    public function __construct($continuousCheckConfirmationRequired)
    {
        $this->continuousCheckConfirmationRequired = $continuousCheckConfirmationRequired;
    }
}
