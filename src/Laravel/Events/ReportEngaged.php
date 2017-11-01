<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

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
