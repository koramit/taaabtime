<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    public function create()
    {
        if (! $employee = session('employee-register')) {
            return redirect()->route('login');
        }

        return Inertia::render('Auth/RegisterForm', [
            'registerStoreRoute' => route('register.store'),
            'employee' => [
                'full_name' => $employee->full_name,
            ],
        ]);
    }

    public function store(Request $request)
    {
        if (! $employee = session('employee-register')) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120', 'unique:users'],
            'terms_and_policies_accepted' => ['required', 'accepted'],
        ]);

        $auth = User::query()->create([
            'login' => session('login-register'),
            'name' => $validated['name'],
            'password' => Hash::make(Str::random()),
            'employee_id' => $employee->id,
        ]);

        Auth::login($auth);
        session()->forget('employee-register');
        session()->forget('login-register');

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
