<?php

namespace App\APIs;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthUserAPI
{
    public function authenticate(string $login, string $password): array
    {
        return $this->makePost(config('app.AUTH_USER_URL'), ['login' => $login, 'password' => $password], 2);
    }

    protected function makePost(string $route, array $form, int $timeout)
    {
        try {
            $response = Http::acceptJson()
                        ->withHeaders([
                            'app' => config('app.AUTH_USER_APP'),
                            'token' => config('app.AUTH_USER_TOKEN'),
                        ])->withOptions(['timeout' => $timeout])
                        ->post($route, $form);
        } catch (\Exception $e) {
            Log::error($route.'|'.$e->getMessage());

            return ['ok' => false, 'status' => 503, 'error' => 'server', 'message' => 'ระบบไม่สามารถให้ยริการได้ กรุณาลองใหม่ในอีกสักครู่'];
        }

        if ($response->successful()) {
            return $response->json();
        }
        Log::error($route.'|'.$response->status().'|'.$response->body());

        return [
            'ok' => false,
            'status' => $response->status(),
            'error' => $response->serverError() ? 'server' : 'client',
            'message' => $response->body(),
        ];
    }
}
