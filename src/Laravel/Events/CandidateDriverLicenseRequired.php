<?php

namespace Lyal\Checkr\Laravel\Events;

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
