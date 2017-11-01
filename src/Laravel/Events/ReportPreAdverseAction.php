<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class ReportPreAdverseAction
{


    public $reportPreAdverseAction;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $reportPreAdverseAction
     */
     
    public function __construct($reportPreAdverseAction)
    {
        $this->reportPreAdverseAction = $reportPreAdverseAction;
    }
}
