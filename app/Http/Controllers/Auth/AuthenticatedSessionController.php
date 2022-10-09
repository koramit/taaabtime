<?php

namespace App\Http\Controllers\Auth;

use App\APIs\AuthUserAPI;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/LoginForm', ['loginStoreRoute' => route('login.store')]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'login' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'max:60'],
        ]);

        $user = (new AuthUserAPI())->authenticate($validated['login'], $validated['password']);
        if (! $user['ok'] || ! ($user['found'] ?? false)) {
            return back()->withErrors(['login' => $user['message'] ?? $user['body']]);
        }

        $employee = Employee::query()->where('org_id', $user['org_id'])->first();
        if (! $employee) {
            return back()->withErrors(['login' => 'ไม่สามารลงทะเบียนได้']);
        }




        if (!$auth = User::query()->where('login', $validated['login'])->first()) {
            // @TODO registration
            // redirect register

            // temporary create user
            $auth = User::query()->create([
                'login' => $validated['login'],
                'name' => $validated['login'],
                'password' => Hash::make(Str::random()),
                'employee_id' => $employee->id,
            ]);
        }

        Auth::login($auth);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
