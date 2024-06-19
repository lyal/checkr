<?php

namespace Lyal\Checkr\Laravel\Events;

class InvitationDeleted
{
    public $invitationDeleted;

    /**
     * Create a new event instance.
     *
     * @param \stdClass $invitationDeleted
     */
    public function __construct($invitationDeleted)
    {
        $this->invitationDeleted = $invitationDeleted;
    }
}
