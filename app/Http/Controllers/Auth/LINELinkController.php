<?php

namespace App\Http\Controllers\Auth;

use App\APIs\LINELoginAPI;
use App\Http\Controllers\Controller;
use App\Models\SocialProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LINELinkController extends Controller
{
    public function create(SocialProvider $provider)
    {
        return (new LINELoginAPI($provider))->redirect('link');
    }

    public function store(Request $request, SocialProvider $provider)
    {
        try {
            $socialUser = (new LINELoginAPI($provider));
            $socialUser($request->all(), 'link');
        } catch (Exception $e) {
            Log::error('uid:'.$request->user()->id.', message:'.$e->getMessage());

            return redirect()->route('preference')->withErrors(['status' => $e->getMessage()]);
        }

        $request->user()->socialProfiles()->firstOrCreate(
            [
                'profile_id' => $socialUser->getId(),
                'social_provider_id' => $provider->id,
            ],
            [
                'profile' => [
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'avatar' => $socialUser->getAvatar(),
                    'nickname' => $socialUser->getNickname(),
                    'status' => $socialUser->getStatus(),
                ],
            ]
        );

        return redirect()->route('preference');
    }
}
