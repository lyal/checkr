<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportCompleted
{
    public $reportCompleted;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportCompleted
     */
    public function __construct($reportCompleted)
    {
        $this->reportCompleted = $reportCompleted;
    }
}
