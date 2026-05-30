<?php

use App\Http\Controllers\Platform\Auth\AuthenticationController;
use App\Http\Controllers\Platform\Company\CompanyController;
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

            Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

            Route::get('/dashboard', function () {
                return view('partials.dashboard');
            })->name('dashboard');

            // Companies Routes
            // List all companies
            Route::get('/clients', [CompanyController::class, 'index'])
                ->name('companies');
            // Delete a company
            Route::delete('/clients/{company}', [CompanyController::class, 'destroy'])
                ->name('companies.destroy');
            // Toggle company status
            Route::put('/clients/{company}/toggle-status', [CompanyController::class, 'toggleStatus'])
                ->name('companies.toggle-status');
            // View deleted companies
            Route::get('/clients/deleted', [CompanyController::class, 'deletedCompanies'])
                ->name('companies.deleted');
            // Restore a company
            Route::put('/clients/{company}/restore', [CompanyController::class, 'restoreCompany'])
                ->name('companies.restore');
            // Show a company
            Route::get('/clients/{company}/view', [CompanyController::class, 'viewCompany'])
                ->name('companies.view');
            // Edit a company
            Route::get('/clients/{company}/edit', [CompanyController::class, 'editCompany'])
                ->name('companies.edit');
            // Update a company
            Route::put('/clients/{company}', [CompanyController::class, 'updateCompany'])
                ->name('companies.update');
            // Create a company
            Route::get('/clients/create', [CompanyController::class, 'createCompany'])
                ->name('companies.create');
            // Store a company
            Route::post('/clients', [CompanyController::class, 'storeCompany'])
                ->name('companies.store');
        });
    });
