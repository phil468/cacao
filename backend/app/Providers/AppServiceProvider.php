<?php

namespace App\Providers;

use App\Contracts\PaymentGateway;
use App\Contracts\SmsOrderNotifier;
use App\Services\Messaging\DisabledSmsOrderNotifier;
use App\Services\Payments\ManualPaymentGateway;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PaymentGateway::class, ManualPaymentGateway::class);
        $this->app->bind(SmsOrderNotifier::class, DisabledSmsOrderNotifier::class);
    }

    public function boot(): void
    {
        RateLimiter::for('api', fn (Request $r) => Limit::perMinute(120)->by($r->user()?->id ?: $r->ip()));
        RateLimiter::for('auth', fn (Request $r) => Limit::perMinute(10)->by($r->ip()));
        RateLimiter::for('sensitive', fn (Request $r) => Limit::perMinute(30)->by($r->user()?->id ?: $r->ip()));
    }
}
