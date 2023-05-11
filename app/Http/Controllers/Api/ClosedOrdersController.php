<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClosedOrderResource;
use App\Http\Resources\UserCryptoResource;
use App\Models\Crypto;
use App\Models\Order;
use App\Models\Position;
use App\Models\Ticker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClosedOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->where('status', 'NEW')
            ->with('user', 'ticker')
            ->get();

        return ClosedOrderResource::collection($orders);
    }

    public function store(Request $request): JsonResponse
    {
        $status = $request->get('status');
        $symbol = $request->get('symbol');
        $order_id = $request->get('order_id');

        $ticker = Ticker::query()
            ->firstWhere('name', $symbol);

        if (! $ticker) {
            return response()->json(['message' => 'No Symbol']);
        }

        if ($status === 'FILLED') {
            $position = Position::query()
                ->firstWhere('ticker_id', $ticker->id);
            $position?->delete();

            $order = Order::query()
                ->where('order_id', $order_id)
                ->where('status', 'NEW')
                ->first();
            $order?->update(['status' => 'FILLED']);

            $crypto = Crypto::query()
                ->where('ticker_id', $ticker->id)
                ->first();
            $crypto?->update(['is_blocked' => false]);
        }

        return response()->json($request->all());
    }
}
