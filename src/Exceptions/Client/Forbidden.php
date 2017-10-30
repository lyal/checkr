<?php

namespace Lyal\Checkr\Exceptions\Client;

class Forbidden extends \Exception
{
    public function __construct($response)
    {
        $message = 'You do not have permission to access the requested resource.  Response: '.$response;
        parent::__construct($message);
    }
}
