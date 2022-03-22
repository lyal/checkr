<?php

namespace Lyal\Checkr\Laravel\Events;

class CandidateUpdated
{
    public $candidateUpdated;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $candidateUpdated
     */
    public function __construct($candidateUpdated)
    {
        $this->candidateUpdated = $candidateUpdated;
    }
}
