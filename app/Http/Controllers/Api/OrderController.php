<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\Api\OrderResource;
use App\Models\Crypto;
use App\Models\Order;
use App\Models\Ticker;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->with('ticker')
            ->latest('id')
            ->limit(100)
            ->get();

        return OrderResource::collection($orders);
    }

    public function store(OrderRequest $request): OrderResource
    {
        $ticker = Ticker::query()
            ->where('name', $request->get('symbol'))
            ->first();
        $data = $request->all();
        $data['ticker_id'] = $ticker->id;
        $order = Order::query()->create($data);

        $crypto = Crypto::query()
            ->where('ticker_id', $ticker->id)
            ->where('user_id', $request->get('user_id'))
            ->first();
        $crypto->update(['is_blocked' => true]);


        return OrderResource::make($order);
    }
}
