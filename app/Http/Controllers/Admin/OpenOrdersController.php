<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OpenOrdersController extends Controller
{
    public function index()
    {
        $open_orders = Order::query()
            ->where('status', 'NEW')
            ->latest('id')
            ->paginate();

        return view('admin.open-orders.index', compact('open_orders'));
    }
}
