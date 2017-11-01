<?php

namespace Lyal\Checkr\Exceptions;

class UnhandledCheckrWebhook extends \Exception
{
    public function __construct($event)
    {
        $message = 'An unexpected Checkr webhook was sent: ' . $event;
        parent::__construct($message);
    }
}
