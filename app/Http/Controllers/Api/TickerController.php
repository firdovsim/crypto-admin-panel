<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TickerRequest;
use App\Http\Resources\Api\TickerResource;
use App\Models\Ticker;
use Illuminate\Http\JsonResponse;

class TickerController extends Controller
{
    public function index()
    {
        $tickers = Ticker::query()
            ->latest('id')
            ->get();

        return TickerResource::collection($tickers);
    }

    public function store(TickerRequest $request): JsonResponse
    {
        $tickers = $request->get('data');

        foreach ($tickers as $item) {
            $ticker = Ticker::query()->firstWhere('name', $item['name']);
            if (! $ticker) continue;

            $ticker->price = $item['price'];
            $ticker->save();
        }

        return response()->json(['message' => 'OK']);
    }
}
