<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderRequest;
use App\Models\Order;
use App\Models\Ticker;
use App\Models\User;
use App\Services\Binance;
use App\Services\BinanceFuture;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->with('ticker')
            ->latest('id')
            ->paginate();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $tickers = Ticker::all();

        $user = User::query()->firstWhere('id', \Auth::id());

        $binance = new Binance($user->api_key_real, $user->api_sec_real);
        $binance->futures();

        return view('admin.orders.create', compact('tickers'));
    }

    public function store(OrderRequest $request): RedirectResponse
    {
        Order::create($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        $tickers = Ticker::all();

        return view('admin.orders.edit', compact('order', 'tickers'));
    }

    public function update(Order $order, OrderRequest $request): RedirectResponse
    {
        $order->update($request->all());

        return redirect()->back();
    }

    public function destroy(Order $order): RedirectResponse
    {
        try {
            $order->delete();
        } catch (\Exception) {
            return redirect()->back()->with('message', 'Error on delete');
        }

        return redirect()->back()->with('message', 'Crypto deleted');
    }
}
