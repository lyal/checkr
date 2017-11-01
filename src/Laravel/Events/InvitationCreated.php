<?php

namespace Lyal\Checkr\Laravel\Events;

class InvitationCreated
{
    public $invitationCreated;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $invitationCreated
     */
    public function __construct($invitationCreated)
    {
        $this->invitationCreated = $invitationCreated;
    }
}
