<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

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
