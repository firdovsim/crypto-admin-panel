<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TelegramBot;
use App\Models\TelegramChat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function sendMessage(Request $request): JsonResponse
    {
        $user_id = $request->get('user_id');

        $botsIds = TelegramBot::query()
            ->where('user_id', $user_id)
            ->pluck('id');

        $chats = TelegramChat::query()
            ->whereIn('telegraph_bot_id', $botsIds)
            ->get();

        $counter = 0;
        foreach ($chats as $chat) {
            $chat->html('Error happened')->send();
            $counter++;
        }


        return response()->json([
            'message' => 'OK',
            'counter' => $counter
        ]);
    }

    public function sendOrderMessage(Request $request)
    {
        $user_id = $request->get('user_id');
        $symbol = $request->get('symbol');
        $quantity = $request->get('quantity');
        $price = $request->get('price');
        $takeProfit = $request->get('take_profit');

        $botsIds = TelegramBot::query()
            ->where('user_id', $user_id)
            ->pluck('id');

        $chats = TelegramChat::query()
            ->whereIn('telegraph_bot_id', $botsIds)
            ->get();

        $counter = 0;
        $html = <<<EOF
            Open Symbol: {$symbol}\nQuantity: {$quantity}\nOpen Price: {$price}\nClose Price: {$takeProfit}
        EOF;

        foreach ($chats as $chat) {
            $chat->html($html)->send();
            $counter++;
        }

        return response()->json(['message' => 'OK', 'counter' => $counter]);
    }
}
