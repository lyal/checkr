<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportCreated
{
    public $reportCreated;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportCreated
     */
    public function __construct($reportCreated)
    {
        $this->reportCreated = $reportCreated;
    }
}
