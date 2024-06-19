<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportCanceled
{
    public $reportCanceled;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $reportCanceled
     */
    public function __construct($reportCanceled)
    {
        $this->reportCanceled = $reportCanceled;
    }
}
