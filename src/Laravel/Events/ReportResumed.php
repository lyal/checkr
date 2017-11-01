<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class ReportResumed
{


    public $reportResumed;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportResumed
     */
     
    public function __construct($reportResumed)
    {
        $this->reportResumed = $reportResumed;
    }
}
