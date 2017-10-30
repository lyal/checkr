<?php
namespace Lyal\Checkr\Exceptions;


class InvalidAttributeException extends \Exception
{
    public function __construct($class, $key)
    {
        $message = 'Unknown attribute on resource ' . $class . ': ' . $key;
        parent::__construct($message);
    }
}