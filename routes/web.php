<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MonthlyTimesheetController;
use App\Http\Controllers\PreferenceController;
use Illuminate\Support\Facades\Route;

\Auth::loginUsingId(1);

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
});
Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');
