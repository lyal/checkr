<?php

namespace Lyal\Checkr\Laravel\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Lyal\Checkr\Laravel\Facades\Checkr;

class Webhook
{
    public function handle($request, Closure $next)
    {
        if (stripos($request->header('User-Agent'), 'Checkr-Webhook') === false) {
            Log::alert('Invalid user agent for Checkr webhook');
            abort(404);
        }

        if (hash_hmac('SHA256', $request->getContent(), Checkr::getKey()) !== $request->header('X-Checkr-Signature')) {
            Log::alert('Checkr signature does not match request.');
            abort(404);
        }

        return $next($request);
    }
}
