<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportUpgraded
{
    public $reportUpgraded;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportUpgraded
     */
    public function __construct($reportUpgraded)
    {
        $this->reportUpgraded = $reportUpgraded;
    }
}
