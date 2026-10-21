<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        if ($request->routeIs('promo', 'promo.*')) {
            $response->headers->set('Cache-Control', 'private, no-store');
            $response->headers->set('Referrer-Policy', 'no-referrer');
        }
        $camera = $request->is('admin/promo-codes', 'pos', 'pos/*') ? '(self)' : '()';
        if ($request->is('pos', 'pos/*')) {
            $response->headers->set('Cache-Control', 'private, no-store');
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow, noarchive');
        }
        $response->headers->set('Permissions-Policy', 'camera='.$camera.', microphone=(), geolocation=(self)');
        if (app()->environment('staging')) {
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow, noarchive');
        }

        if (app()->isProduction() && $request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        return $response;
    }
}
