<?php

namespace Database\Seeders;

use App\Models\Indicator;
use App\Models\Ticker;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Ticker::all() as $ticker) {
            Indicator::create([
                'name' => 'RSI',
                'value' => 0,
                'ticker_id' => $ticker->id,
                'interval' => '1h'
            ]);
        }
    }
}
