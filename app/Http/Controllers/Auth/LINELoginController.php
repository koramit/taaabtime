<?php

namespace App\Http\Controllers\Auth;

use App\APIs\LINELoginAPI;
use App\Http\Controllers\Controller;
use App\Models\SocialProfile;
use App\Models\SocialProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LINELoginController extends Controller
{
    public function create(SocialProvider $provider)
    {
        return (new LINELoginAPI($provider))->redirect();
    }

    public function store(Request $request, SocialProvider $provider)
    {
        try {
            $socialUser = (new LINELoginAPI($provider));
            $socialUser($request->all());
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('login')->withErrors(['status' => $e->getMessage()]);
        }

        if (! $user = SocialProfile::query()->where('profile_id', $socialUser->getId())->activeLoginByProviderId($provider->id)->first()?->user) {
            return redirect()->route('login')->withErrors(['notice' => 'กรุณาทำการเชื่อมต่อ LINE ในหน้าตั้งค่าก่อน']);
        }

        // @TODO check AD password expired
        // if (now()->greaterThan(now()->create($user->profile['password_expiration_date']))) {
        //     return redirect()->route('login')->withErrors(['notice' => 'Please login using Siriraj AD to reactivate LINE login.']);
        // }

        Auth::login($user);

        return redirect()->intended(route('home'));
    }
}
