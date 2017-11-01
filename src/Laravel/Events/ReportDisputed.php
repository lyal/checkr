<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportDisputed
{
    public $reportDisputed;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportDisputed
     */
    public function __construct($reportDisputed)
    {
        $this->reportDisputed = $reportDisputed;
    }
}
