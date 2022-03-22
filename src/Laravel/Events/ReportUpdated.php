<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportUpdated
{
    public $reportUpdated;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $reportUpdated
     */
    public function __construct($reportUpdated)
    {
        $this->reportUpdated = $reportUpdated;
    }
}
