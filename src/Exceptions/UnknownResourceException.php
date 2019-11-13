<?php

namespace Lyal\Checkr\Exceptions;

class UnknownResourceException extends Exception
{
    public function __construct($name)
    {
        $message = 'Unknown checkr resource: ' . $name;
        parent::__construct($message);
    }
}
