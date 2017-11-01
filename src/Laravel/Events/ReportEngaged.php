<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportEngaged
{
    public $reportEngaged;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportEngaged
     */
    public function __construct($reportEngaged)
    {
        $this->reportEngaged = $reportEngaged;
    }
}
