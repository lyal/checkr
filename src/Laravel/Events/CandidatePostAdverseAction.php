<?php

namespace Lyal\Checkr\Laravel\Events;

class CandidatePostAdverseAction
{
    public $candidatePostAdverseAction;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $candidatePostAdverseAction
     */
    public function __construct($candidatePostAdverseAction)
    {
        $this->candidatePostAdverseAction = $candidatePostAdverseAction;
    }
}
