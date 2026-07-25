<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaptureMarketingAttribution
{
    private const PARAMETERS = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET')) {
            $attribution = collect(self::PARAMETERS)
                ->mapWithKeys(fn (string $key): array => [$key => mb_substr((string) $request->query($key, ''), 0, 150)])
                ->filter()
                ->all();

            if ($attribution !== []) {
                $attribution['landing_path'] = '/'.ltrim($request->path(), '/');
                $attribution['captured_at'] = now()->toIso8601String();
                $request->session()->put('marketing_attribution', $attribution);
            }
        }

        return $next($request);
    }
}
