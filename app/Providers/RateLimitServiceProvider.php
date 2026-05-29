<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class RateLimitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        RateLimiter::for('user-login', function (Request $request) {

            return Limit::perMinute(3)
                ->by(strtolower($request->email).'|'.$request->ip())
                ->response(function () {

                    return back()->withErrors([
                        'email' => 'Too many login attempts. Please try again in 1 minute.',
                    ]);
                });
        });

        RateLimiter::for('platform-login', function (Request $request) {

            return Limit::perMinute(5)
                ->by(strtolower($request->email).'|'.$request->ip())
                ->response(function () {

                    return back()->withErrors([
                        'email' => 'Too many login attempts. Please try again in 1 minute.',
                    ]);
                });
        });
    }
}
