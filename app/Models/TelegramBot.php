<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphBot;

class TelegramBot extends TelegraphBot
{
    protected $table = 'telegraph_bots';

    protected $fillable = [
        'name',
        'token',
        'user_id'
    ];
}
