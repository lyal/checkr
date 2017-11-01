<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

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
