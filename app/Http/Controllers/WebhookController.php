<?php

namespace App\Http\Controllers;

use App\Managers\Messaging\LINEMessagingManager;
use App\Models\ChatBot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function __invoke(Request $request, ChatBot $chatBot): array
    {
        // LINE request signature validation
        $hash = hash_hmac('sha256', $request->getContent(), $chatBot->callback_token, true);
        $signature = base64_encode($hash);

        if ($request->header('x-line-signature') !== $signature) {
            abort(404);
        }

        if (! $request->has('events')) { // this should never have happened
            Log::warning('LINE bad response');
            abort(400);
        }

        if (empty($request->input('events'))) { // LINE verify webhook
            return ['ok' => true];
        }

        (new LINEMessagingManager($chatBot))->manage($request->all());

        return ['ok' => true];
    }
}
