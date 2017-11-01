<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

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
