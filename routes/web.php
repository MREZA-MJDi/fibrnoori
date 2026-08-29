<?php

use App\Http\Controllers\Account\FiberRequestController as AccountFiberRequestController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FiberRequestController as AdminFiberRequestController;
use App\Http\Controllers\Admin\ModemController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TariffController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Site
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/tariffs', [HomeController::class, 'tariffs'])
    ->name('tariffs.index');

Route::get('/modems', [HomeController::class, 'modems'])
    ->name('modems.index');

Route::get('/contact', [HomeController::class, 'contact'])
    ->name('contact');


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('auth.login');

    Route::post('/login', [AuthController::class, 'sendOtp'])
        ->name('auth.send-otp');

    Route::get('/login/verify', [AuthController::class, 'showVerify'])
        ->name('auth.verify');

    Route::post('/login/verify', [AuthController::class, 'verifyOtp'])
        ->name('auth.verify-otp');
});


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');


/*
|--------------------------------------------------------------------------
| Customer Account
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'customer'])
    ->prefix('account')
    ->name('account.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::view('/', 'account.dashboard')
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Profile
        |--------------------------------------------------------------------------
        */

        Route::view('/profile', 'account.profile')
            ->name('profile');


        /*
        |--------------------------------------------------------------------------
        | Fiber Requests
        |--------------------------------------------------------------------------
        */

        Route::get('/requests', [AccountFiberRequestController::class, 'index'])
            ->name('requests.index');

        Route::get('/requests/create', [AccountFiberRequestController::class, 'create'])
            ->name('requests.create');

        Route::post('/requests', [AccountFiberRequestController::class, 'store'])
            ->name('requests.store');

        Route::get('/requests/{fiberRequest}/edit', [AccountFiberRequestController::class, 'edit'])
            ->name('requests.edit');

        Route::put('/requests/{fiberRequest}', [AccountFiberRequestController::class, 'update'])
            ->name('requests.update');

        Route::get('/requests/{fiberRequest}', [AccountFiberRequestController::class, 'show'])
            ->name('requests.show');
    });


/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/', [AdminDashboardController::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Fiber Requests
        |--------------------------------------------------------------------------
        */

        Route::get('/requests', [AdminFiberRequestController::class, 'index'])
            ->name('requests.index');

        Route::get('/requests/{fiberRequest}', [AdminFiberRequestController::class, 'show'])
            ->name('requests.show');

        Route::patch(
            '/requests/{fiberRequest}/status',
            [AdminFiberRequestController::class, 'updateStatus']
        )->name('requests.status');


        /*
        |--------------------------------------------------------------------------
        | Tariffs
        |--------------------------------------------------------------------------
        */

        Route::resource('tariffs', TariffController::class)
            ->except([
                'show',
            ]);


        /*
        |--------------------------------------------------------------------------
        | Modems
        |--------------------------------------------------------------------------
        */

        Route::resource('modems', ModemController::class)
            ->except([
                'show',
            ]);


        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        Route::get('/settings', [SettingsController::class, 'index'])
            ->name('settings');
    });
