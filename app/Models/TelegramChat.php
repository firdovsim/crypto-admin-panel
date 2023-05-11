<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphChat;

class TelegramChat extends TelegraphChat
{
    protected $table = 'telegraph_chats';

    protected $fillable = [
        'name',
        'chat_id',
        'telegraph_bot_id'
    ];
}
