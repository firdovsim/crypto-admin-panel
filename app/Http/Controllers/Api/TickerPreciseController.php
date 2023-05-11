<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TickerPreciseResource;
use App\Models\Ticker;
use App\Models\TickerPrecise;
use Illuminate\Http\Request;

class TickerPreciseController extends Controller
{
    public function index()
    {
        $tickerPrecises = TickerPrecise::query()
            ->latest('id')
            ->get();

        return TickerPreciseResource::collection($tickerPrecises);
    }

    public function store(Request $request)
    {
        $ticker = Ticker::query()->firstWhere('name', $request->get('symbol'));
        if (! $ticker) {
            return response()->json(['message' => 'No Ticker found']);
        }

        $tickerPrecise = TickerPrecise::query()->firstWhere('ticker_id', $ticker->id);
        if ($tickerPrecise) {
            return response()->json(['message' => 'Ticker already exist']);
        }

        $tickerPrecise = TickerPrecise::query()->create([
            'ticker_id' => $ticker->id,
            'price_precision' => $request->get('price_precision'),
            'quantity_precision' => $request->get('quantity_precision')
        ]);

        return TickerPreciseResource::make($tickerPrecise);
    }
}
