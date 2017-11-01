<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

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
