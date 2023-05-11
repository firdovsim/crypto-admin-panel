<?php

namespace App\Console\Commands;

use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Console\Command;

class TelegramBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The telegram bot command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $chat = TelegraphChat::first();
        $chat->html("<b>Winter is Coming</b>\n I'm a bot")->send();

        return 0;
    }
}
