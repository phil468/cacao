<?php

namespace App\Http\Middleware;

use App\Services\PosAccess;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePosAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        abort_unless(app(PosAccess::class)->allowed($request->user()), 403);

        return $next($request);
    }
}
