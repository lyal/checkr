<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportPreAdverseAction
{
    public $reportPreAdverseAction;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportPreAdverseAction
     */
    public function __construct($reportPreAdverseAction)
    {
        $this->reportPreAdverseAction = $reportPreAdverseAction;
    }
}
