<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PosSessionCookie
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('pos', 'pos/*') || (config('pos.domain') && $request->getHost() === config('pos.domain'))) {
            config(['session.cookie' => 'cacao_pos_session', 'session.domain' => null]);
            // Providers can resolve the session store before route middleware runs.
            app('session')->driver()->setName('cacao_pos_session');
        }

        return $next($request);
    }
}
