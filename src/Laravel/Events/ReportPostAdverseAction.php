<?php

namespace Lyal\Checkr\Laravel\Events;

class ReportPostAdverseAction
{
    public $reportPostAdverseAction;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportPostAdverseAction
     */
    public function __construct($reportPostAdverseAction)
    {
        $this->reportPostAdverseAction = $reportPostAdverseAction;
    }
}
