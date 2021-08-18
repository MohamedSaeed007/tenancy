<?php

use App\Http\Controllers\Store\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;



Route::prefix('store')->name('store.')->group(function () {
    Route::view('/login', 'store.auth.login')->name('login');


// Registration...

        Route::view('/register', 'store.auth.register')
            ->middleware(['guest:store'])
            ->name('register');
    

    Route::post('/register', [RegisterController::class, 'store'])
        ->middleware(['guest:store']);




///////login
    $limiter = config('fortify.limiters.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:store',
            $limiter ? 'throttle:'.$limiter : null,
        ]));


        ///////////////for login store owner
    Route::middleware('auth:store')->group(function () {
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        Route::view('/home', 'store.home')->name('home');
    });
        




});

