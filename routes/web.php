<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia\Inertia::render('Welcome');
})->middleware(['auth'])->name('home');

// Auth
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest'])
    ->name('login.store');
Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');
