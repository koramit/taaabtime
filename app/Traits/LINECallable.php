<?php

namespace App\Traits;

use App\Models\ChatBot;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait LINECallable
{
    /** Reply tokens can only be used once. */
    /** Reply tokens must be used within one minute after receiving the webhook */
    private function replyMessage(ChatBot $bot, string $replyToken, array $messages): ?array
    {
        $payload = [
            'replyToken' => $replyToken,
            'messages' => $messages,
        ];

        return $this->makePost($bot->configs['token'], 'message/reply', $payload)
            ? $payload
            : null;
    }

    private function pushMessage(ChatBot $bot, string $to, array $messages): ?array
    {
        $payload = [
            'to' => $to,
            'messages' => $messages,
        ];

        return $this->makePost($bot->configs['token'], 'message/push', $payload)
            ? $payload
            : null;
    }

    private function makePost(string $token, string $url, array $payload): bool
    {
        try {
            Http::timeout(2)
                ->retry(3, 100)
                ->withToken($token)
                ->post('https://api.line.me/v2/bot/'.$url, $payload);
        } catch (Exception $e) {
            Log::error('LINE API ERROR : '.$e->getMessage());

            return false;
        }

        return true;
    }
}
