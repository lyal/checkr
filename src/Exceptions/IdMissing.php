<?php
namespace Lyal\Checkr\Exceptions;


class IdMissing extends \Exception
{
    public function __construct($object)
    {
        $message = 'Id must be set to save an entity. Entity values: ' . json_encode($object->getAttributes());
        parent::__construct($message);
    }
}