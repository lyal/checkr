<?php

namespace Lyal\Checkr\Exceptions\Server;

class InternalServerError extends \Exception
{
    public function __construct($response)
    {
        $message = 'Something went wrong with the Checkr API. Response: '.$response;
        parent::__construct($message);
    }
}
