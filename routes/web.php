<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StripeController;
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
        Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');
        Route::get('/', [AppController::class, 'index'])->name('index');

        Route::prefix('todos')
            ->name('todos.')
            ->controller(AppController::class)
            ->group(function () {
                Route::post('/', 'store')->name('store');
                Route::put('{todo}/mark-as-completed', 'markAsCompleted')->name('mark-as-completed');
                Route::delete('{todo}', 'destroy')->name('destroy');
            });

        Route::prefix('settings')
            ->controller(SettingController::class)
            ->name('settings.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::put('/', 'update')->name('update');
                Route::get('/theme', 'theme')->name('theme.index');
                Route::get('/billing', 'billing')->name('billing.index');
            });

        Route::get('/checkout', [StripeController::class, 'index'])->name('checkout');
    });

