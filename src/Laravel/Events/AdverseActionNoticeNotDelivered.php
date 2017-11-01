<?php

namespace Lyal\Checkr\Laravel\Events;

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
