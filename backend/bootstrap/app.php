<?php

use App\Http\Middleware\CaptureMarketingAttribution;
use App\Http\Middleware\SecurityHeaders;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(web: __DIR__.'/../routes/web.php', api: __DIR__.'/../routes/api.php', commands: __DIR__.'/../routes/console.php', health: '/up', apiPrefix: 'api')
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [CaptureMarketingAttribution::class]);
        $middleware->append(SecurityHeaders::class);
        $middleware->statefulApi();
        $middleware->redirectGuestsTo(fn (Request $request) => $request->expectsJson() ? null : route('login'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(fn (Request $request) => $request->is('api/*') || $request->expectsJson());
        $exceptions->respond(function ($response, Throwable $exception, Request $request) {
            if (! $request->is('api/*')) {
                return $response;
            }
            if ($exception instanceof ValidationException) {
                return $response;
            }
            $status = $exception instanceof HttpExceptionInterface ? $exception->getStatusCode() : $response->getStatusCode();

            return response()->json(['message' => $status >= 500 ? 'Ocurrió un error inesperado.' : ($exception->getMessage() ?: 'No se pudo procesar la solicitud.')], $status);
        });
    })->create();
