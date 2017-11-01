<?php
namespace Lyal\Checkr\Laravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class InvitationCompleted
{


    public $invitationCompleted;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $invitationCompleted
     */
     
    public function __construct($invitationCompleted)
    {
        $this->invitationCompleted = $invitationCompleted;
    }
}
