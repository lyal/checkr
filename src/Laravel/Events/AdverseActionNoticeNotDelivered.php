<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class AdverseActionNoticeNotDelivered
{


    public $adverseActionNoticeNotDelivered;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $adverseActionNoticeNotDelivered
     */
     
    public function __construct($adverseActionNoticeNotDelivered)
    {
        $this->adverseActionNoticeNotDelivered = $adverseActionNoticeNotDelivered;
    }
}
