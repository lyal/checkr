<?php

namespace Lyal\Checkr\Laravel\Events;

class InvitationExpired
{
    public $invitationExpired;

    /**
     * Create a new event instance.
     *
     * @param \StdClass $invitationExpired
     */
    public function __construct($invitationExpired)
    {
        $this->invitationExpired = $invitationExpired;
    }
}
