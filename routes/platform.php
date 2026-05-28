<?php

use App\Http\Controllers\Platform\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::prefix('platform')
    ->name('platform.')
    ->group(function () {

        Route::middleware('guest:platform')->group(function () {

            Route::get('/login', [AuthenticationController::class, 'showLoginForm'])
                ->name('login');

            Route::post('/login', [AuthenticationController::class, 'login'])
                ->name('login.submit');
        });

        Route::middleware('auth:platform')->group(function () {

            Route::post('/logout', [AuthenticationController::class, 'logout'])
                ->name('logout');

            Route::get('/dashboard', function () {

                return view('platform.dashboard');

            })->name('dashboard');
        });
    });
