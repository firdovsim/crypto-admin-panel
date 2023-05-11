<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crypto;
use App\Models\Ticker;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoadController extends Controller
{
    public function loadDefaults()
    {
        $cryptos = getCryptos();

        $tickers = collect();
        foreach ($cryptos as $crypto) {
            $tickers->push( [
                'name' => $crypto['name'],
                'take_profit' => $crypto['take_profit'],
                'quantity' => $crypto['quantity'],
                'ticker_id' => Ticker::query()
                    ->where('name', $crypto['name'])
                    ->first()->id
            ]);
        }

        try {
            DB::beginTransaction();

            $user = User::query()->find(Auth::id());

            foreach ($tickers as $ticker) {
                $crypto = Crypto::query()
                    ->where('ticker_id', $ticker['ticker_id'])
                    ->where('user_id', $user->id)
                    ->first();
                if (! $crypto) {
                    Crypto::query()->create([
                        'ticker_id' => $ticker['ticker_id'],
                        'minimum_rsi' => 30,
                        'maximum_rsi' => 70,
                        'take_profit' => $ticker['take_profit'],
                        'quantity' => $ticker['quantity'],
                        'interval' => '1h',
                        'user_id' => $user->id
                    ]);
                } else {
                    $crypto->update(['take_profit' => $ticker['take_profit'], 'quantity' => $ticker['quantity']]);
                }
            }
            DB::commit();
        } catch (\Throwable) {
            DB::rollBack();
        }
        return redirect()->back();
    }
}
