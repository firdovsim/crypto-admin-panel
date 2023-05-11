<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\TradeHistoryResource;
use App\Models\IndicatorHistory;
use App\Models\Ticker;
use App\Models\TradeHistory;
use Illuminate\Http\Request;

class TradeHistoryController extends Controller
{
    public function index()
    {
        $tradeHistory = TradeHistory::query()
            ->latest('id')
            ->get();

        return TradeHistoryResource::collection($tradeHistory);
    }

    public function store(Request $request)
    {
        $trade = TradeHistory::query()->firstWhere('trade_id', $request->get('trade_id'));
        if ($trade) {
            return response()->json(['message' => 'Given trade is already saved']);
        }

        $ticker = Ticker::query()->firstWhere('name', $request->get('symbol'));

        TradeHistory::query()->create([
            'ticker_id' => $ticker->id,
            'trade_id' => $request->get('trade_id'),
            'order_id' => $request->get('order_id'),
            'side' => $request->get('side'),
            'quantity' => $request->get('quantity'),
            'commission' => $request->get('commission'),
            'realized_pnl' => $request->get('realized_pnl'),
            'time' => $request->get('time'),
        ]);

        return response()->json(['message' => 'ok']);
    }

    public function getHistory()
    {
        $history = IndicatorHistory::query()
            ->where('indicator_id', 46)
            ->latest('created_at')
            ->limit(10)
            ->pluck('value')
            ->toArray();

        $reverse = array_reverse($history);
        return [
            'is_decreasing' => $this->isStrictlyDecreasing($reverse),
            'array' => $reverse
        ];
    }

    function isStrictlyDecreasing($array): bool
    {
        $passes = [];

        $n = count($array);
        for ($i = 1; $i < $n; $i++) {
            if ($array[$i] < $array[$i-1]) {
                $passes[] = $i;
            }
        }

        if (count($array) - count($passes) <= 3) {
            return true;
        }

        return false;
    }
}
