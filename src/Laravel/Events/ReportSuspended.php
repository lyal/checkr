<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportSuspended
{
    public $reportSuspended;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportSuspended
     */
    public function __construct($reportSuspended)
    {
        $this->reportSuspended = $reportSuspended;
    }
}
