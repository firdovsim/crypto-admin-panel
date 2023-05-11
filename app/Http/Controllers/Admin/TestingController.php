<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TelegramBot;
use App\Models\TelegramChat;
use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestingController extends Controller
{
    public function index()
    {
        $botQuery = TelegramBot::query();
        if (Auth::user()->role !== 'admin') {
            $botQuery = $botQuery->where('id', Auth::id());
        }

        $bots = $botQuery->get();
        $chats = TelegramChat::query()
            ->whereIn('telegraph_bot_id', $bots->pluck('id'))
            ->get();

        return view('admin.testing.index', [
            'bots' => $bots,
            'chats' => $chats
        ]);
    }

    public function telegram(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'bot_id' => 'required',
            'chat_id' => 'required',
            'template' => 'required'
        ]);

        $chat = TelegramChat::query()
            ->find($request->get('chat_id'));

        $chat->html($request->get('template'))
            ->send();

        return redirect()->back();
    }

    public function binance(): RedirectResponse
    {
        return redirect()->back();
    }

    public function sockets(): RedirectResponse
    {
        return redirect()->back();
    }

    public function indicator(): RedirectResponse
    {
        return redirect()->back();
    }
}
