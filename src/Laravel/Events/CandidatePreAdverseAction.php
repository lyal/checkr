<?php

namespace Lyal\Checkr\Laravel\Events;

class CandidatePreAdverseAction
{
    public $candidatePreAdverseAction;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $candidatePreAdverseAction
     */
    public function __construct($candidatePreAdverseAction)
    {
        $this->candidatePreAdverseAction = $candidatePreAdverseAction;
    }
}
