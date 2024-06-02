<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::prefix('login')
        ->controller(AuthController::class)
        ->name('login.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::get('/magic/{emailToken:token}', 'magic')->name('magic');
        });
});

Route::middleware('auth')
    ->prefix('app')
    ->name('app.')
    ->group(function () {
        Route::get('/', AppController::class)->name('index');
    });

