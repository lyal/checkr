<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

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
