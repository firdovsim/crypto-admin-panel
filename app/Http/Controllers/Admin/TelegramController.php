<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Telegram\TelegramBotRequest;
use App\Http\Requests\Admin\Telegram\TelegramChatRequest;
use App\Models\TelegramBot;
use App\Models\TelegramChat;
use App\Models\User;
use DefStudio\Telegraph\Models\TelegraphBot;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TelegramController extends Controller
{
    public function index()
    {
        $userQuery = User::query();
        if (Auth::user()->role !== 'admin') {
            $userQuery = $userQuery->where('id', Auth::id());
        }

        $users = $userQuery->get();

        $telegramBotQuery = TelegramBot::query();
        if (Auth::user()->role !== 'admin') {
            $telegramBotQuery = $telegramBotQuery->where('id', Auth::id());
        }

        $telegramBots = $telegramBotQuery->get();

        $telegramChats = TelegramChat::query()
            ->whereIn('telegraph_bot_id', $telegramBots->pluck('id'))
            ->get();

        return view('admin.telegram.index', [
            'users' => $users,
            'telegramBots' => $telegramBots,
            'telegramChats' => $telegramChats
        ]);
    }

    public function storeChat(TelegramChatRequest $request): RedirectResponse
    {
        TelegramChat::query()->create($request->all());

        return redirect()->back();
    }

    public function storeBot(TelegramBotRequest $request): RedirectResponse
    {
        TelegramBot::query()->create($request->all());

        return redirect()->back();
    }

    public function destroyChat(TelegraphChat $telegraphChat): RedirectResponse
    {
        $telegraphChat->delete();

        return redirect()->back();
    }

    public function destroyBot(TelegraphBot $telegraphBot): RedirectResponse
    {
        $telegraphBot->delete();

        return redirect()->back();
    }
}
