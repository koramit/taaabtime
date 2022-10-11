<?php

namespace App\Http\Controllers\Auth;

use App\APIs\AuthUserAPI;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\SocialProvider;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        session()->flash('page-title', 'เข้าสู่ระบบ');

        return Inertia::render('Auth/LoginForm', [
            'routes' => [
                'login' => route('login.store'),
                'lineLogin' => route('line-login.create', SocialProvider::query()->first()->hashed_key),
            ]
        ]);
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
            return back()->withErrors(['login' => 'ไม่สามารลงทะเบียนได้ โปรดติดต่อผู้ดูแลระบบ']);
        }

        if (! $auth = User::query()->where('login', $validated['login'])->first()) {
            session()->put('employee-register', $employee);
            session()->put('login-register', $validated['login']);

            return redirect()->route('register');
        }

        Auth::login($auth);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy()
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }
}
