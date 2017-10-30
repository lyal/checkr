<?php

namespace Lyal\Checkr\Exceptions;

class UnhandledRequestError extends \Exception
{
    public function __construct($code, $response)
    {
        $message = 'The request failed with the error: '.$code.'.  Response: '.$response;
        parent::__construct($message);
    }
}
