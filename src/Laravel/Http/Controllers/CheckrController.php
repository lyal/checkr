<?php

namespace Lyal\Checkr\Laravel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lyal\Checkr\Laravel\Helpers\EventHelper;

class CheckrController extends Controller
{
    /**
     * @param Illuminate\Http\Request $request
     */
    public function handleWebHook(Request $request)
    {
        $input = $request->all();
        $eventHandler = new EventHelper($input);
        $eventHandler->dispatch();

        return response('Webhook received.', 200);
    }
}
