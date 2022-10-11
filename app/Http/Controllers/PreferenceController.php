<?php

namespace App\Http\Controllers;

use App\Models\SocialProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PreferenceController extends Controller
{
    public function __invoke(Request $request)
    {
        session()->flash('page-title', 'ตั้งค่า');
        session()->flash('nav-menu', [
            ['label' => 'ข้อมูลทาบบัตร', 'route' => route('home'), 'active' => $request->route()->getName() === 'home'],
            ['label' => 'ตั้งค่า', 'route' => route('preference'), 'active' => $request->route()->getName() === 'preference'],
        ]);

        $lineLinked = $request->user()->activeLINEProfile;
        $lineAdded = ! $lineLinked
            ? false
            : $request->user()
                ->chatBots()
                ->where('social_provider_id', $lineLinked->social_provider_id)
                ->wherePivot('active', true)
                ->first();

        return Inertia::render('PreferencePage', [
            'routes' => [
                'lineLink' => ! $lineLinked
                    ? route('line-link.create', SocialProvider::query()->first()->hashed_key)
                    : null,
                'lineAdd' => $lineLinked && ! $lineAdded
                    ? $lineLinked->socialProvider->chatBots()->orderBy('user_count')->first()->getAddFriendUrl()
                    : null,
            ],
        ]);
    }
}
