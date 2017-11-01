<?php

namespace Lyal\Checkr\Laravel\Events;

class CandidateCreated
{
    public $candidateCreated;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $candidateCreated
     */
    public function __construct($candidateCreated)
    {
        $this->candidateCreated = $candidateCreated;
    }
}
