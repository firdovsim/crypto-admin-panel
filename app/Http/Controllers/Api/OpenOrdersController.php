<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OpenOrdersResource;
use App\Models\Crypto;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OpenOrdersController extends Controller
{
    public function index()
    {
        $open_orders = Order::query()
            ->where('status', 'NEW')
            ->with('ticker')
            ->get();

        return OpenOrdersResource::collection($open_orders);
    }

    public function store(Request $request): JsonResponse
    {
        $order = Order::query()
            ->where('id', $request->get('id'))
            ->where('order_id', $request->get('order_id'))
            ->first();

        $order->status = 'FILLED';
        $order->avg_price = $request->get('avg_price');
        $order->save();

        return response()->json(['message' => 'ok']);
    }
}
