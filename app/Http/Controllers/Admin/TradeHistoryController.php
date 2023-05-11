<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndicatorHistory;
use App\Models\TradeHistory;
use Illuminate\Http\Request;

class TradeHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = TradeHistory::query();

        if ($request->filled('q')) {
            $name = $request->get('q');
            $query->whereHas('ticker', function ($q) use ($name) {
                return $q->where('name', 'LIKE', "%{$name}%");
            });
        }

        $tradeHistory = $query->with('ticker')
            ->latest('id')
            ->paginate();

        return view('admin.trade-history.index', compact('tradeHistory'));
    }
}
