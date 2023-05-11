<?php

namespace Database\Seeders;

use App\Models\Crypto;
use App\Models\Ticker;
use Illuminate\Database\Seeder;

class CryptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $cryptos = getCryptos();

        foreach ($cryptos as $crypto) {
            $ticker = Ticker::where("name", $crypto['name'])->first();
            Crypto::create([
                'ticker_id' => $ticker->id,
                'minimum_rsi' => 30,
                'maximum_rsi' => 70,
                'take_profit' => $crypto['take_profit'],
                'quantity' => $crypto['quantity'],
                'interval' => '1h',
                'user_id' => 1
            ]);
        }
    }
}
