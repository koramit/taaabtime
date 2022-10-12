<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LINELinkController;
use App\Http\Controllers\Auth\LINELoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MonthlyTimesheetController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', MonthlyTimesheetController::class)
        ->name('home');
    Route::get('preference', PreferenceController::class)
        ->name('preference');
});

// Auth
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('register.store');
    Route::get('line-login/{provider}', [LINELoginController::class, 'create'])
        ->name('line-login.create');
    Route::get('line-login/{provider}/callback', [LINELoginController::class, 'store'])
        ->name('line-login.store');
});
Route::middleware('auth')->group(function () {
    Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get('line-link/{provider}', [LINELinkController::class, 'create'])
        ->name('line-link.create');
    Route::get('line-link/{provider}/callback', [LINELinkController::class, 'store'])
        ->name('line-link.store');
});

Route::post('webhook/messaging/{chatBot:callback_token}', WebhookController::class);

Route::get('logo', function () {
    return Inertia\Inertia::render('DesignLogo');
});
