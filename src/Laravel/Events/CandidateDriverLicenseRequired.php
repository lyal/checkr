<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class CandidateDriverLicenseRequired
{


    public $candidateDriverLicenseRequired;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $candidateDriverLicenseRequired
     */
     
    public function __construct($candidateDriverLicenseRequired)
    {
        $this->candidateDriverLicenseRequired = $candidateDriverLicenseRequired;
    }
}
