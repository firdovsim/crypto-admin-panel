<?php

namespace Database\Seeders;

use App\Models\Ticker;
use Illuminate\Database\Seeder;

class TickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickers = [
            'KAVA/USDT',
            'DOT/USDT',
            'OMG/USDT',
            'ONT/USDT',
            'TRX/USDT',
            'BAT/USDT',
            'ETC/USDT',
            'XMR/USDT',
            'EOS/USDT',
            'XTZ/USDT',
            'BAND/USDT',
            'LINK/USDT',
            'XRP/USDT',
            'XLM/USDT',
            'DASH/USDT',
            'BNB/USDT',
            'ATOM/USDT',
            'ADA/USDT',
            'BCH/USDT',
            'NEO/USDT',
            'THETA/USDT',
            'KNC/USDT',
            'SXP/USDT',
            'SOL/USDT',
            'IOTA/USDT',
            'VET/USDT',
            'QTUM/USDT',
            'ALGO/USDT',
            'COMP/USDT',
            'ZIL/USDT',
            'ZRX/USDT',
            'DOGE/USDT',
            'RLC/USDT',
            'WAVES/USDT',
            'SNX/USDT',
            'BAL/USDT',
            'CRV/USDT',
            'TRB/USDT',
            'RUNE/USDT',
            'SUSHI/USDT',
            'STORJ/USDT',
            'UNI/USDT',
            'AVAX/USDT',
            'FTM/USDT',
            'ENJ/USDT',
            'TOMO/USDT',
            'KSM/USDT',
            'NEAR/USDT',
            'AAVE/USDT',
            'FIL/USDT',
            'LRC/USDT',
            'MATIC/USDT',
            'OCEAN/USDT',
            'BEL/USDT',
            'AXS/USDT',
            'ZEN/USDT',
        ];

        foreach ($tickers as $ticker) {
            Ticker::create([
                'name' => str_replace('/', '', $ticker),
                'ticker' => $ticker
            ]);
        }
    }
}
