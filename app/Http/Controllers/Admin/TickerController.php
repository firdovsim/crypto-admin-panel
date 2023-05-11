<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticker;
use Illuminate\Http\Request;

class TickerController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticker::query();

        if ($request->filled('q')) {
            $name = $request->get('q');
            $query->where('name', 'LIKE', "%{$name}%");
        }

        $tickers = $query->with('tickerPrecise')
            ->oldest('id')
            ->paginate();

        return view('admin.tickers.index', compact('tickers'));
    }
}
