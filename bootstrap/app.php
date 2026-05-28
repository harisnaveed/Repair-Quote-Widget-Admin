<?php

use App\Http\Middleware\ActiveUserMiddleware;
use App\Http\Middleware\CompanyAccessMiddleware;
use App\Http\Middleware\LocationAccessMiddleware;
use App\Http\Middleware\PlatformAuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/platform.php'));
        }
    )

    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->alias([

            // Spatie
            'role' => RoleMiddleware::class,

            'permission' => PermissionMiddleware::class,

            'role_or_permission' => RoleOrPermissionMiddleware::class,

            // Custom Middleware
            'active.user' => ActiveUserMiddleware::class,

            'company.access' => CompanyAccessMiddleware::class,

            'location.access' => LocationAccessMiddleware::class,

            'platform.auth' => PlatformAuthMiddleware::class,

        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })

    ->create();
