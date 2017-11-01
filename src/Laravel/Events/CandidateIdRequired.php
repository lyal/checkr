<?php

namespace Lyal\Checkr\Laravel\Events;

class CandidateIdRequired
{
    public $candidateIdRequired;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $candidateIdRequired
     */
    public function __construct($candidateIdRequired)
    {
        $this->candidateIdRequired = $candidateIdRequired;
    }
}
