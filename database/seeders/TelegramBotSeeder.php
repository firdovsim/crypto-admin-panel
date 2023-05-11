<?php

namespace Database\Seeders;

use App\Models\TelegramBot;
use App\Models\TelegramChat;
use App\Models\User;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Database\Seeder;

class TelegramBotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $telegramBot = TelegramBot::query()->create([
            'token' => '5779287810:AAGAXANzr3LeDlBwXhRDZtZi_nYm7lTF1tU',
            'name' => 'Exchange Bot',
            'user_id' => User::query()->first()->id
        ]);

        TelegramChat::query()->create([
            'chat_id' => 208698331,
            'name' => 'Firdovsi',
            'telegraph_bot_id' => $telegramBot->id
        ]);
    }
}
