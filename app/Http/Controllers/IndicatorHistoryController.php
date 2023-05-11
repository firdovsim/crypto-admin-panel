<?php

namespace App\Http\Controllers;

use App\Models\IndicatorHistory;
use Illuminate\Http\Request;

class IndicatorHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = IndicatorHistory::query();

        if ($request->filled('q')) {
            $name = $request->get('q');
            $query->whereHas('indicator.ticker', function ($q) use ($name) {
                return $q->where('name', 'LIKE', "%{$name}%");
            });
        }

        $totalCount = $query->count();

        $history = $query->with('indicator.ticker')->latest('id')->paginate();
        $history->appends(['q' => $request->get('q')]);

        $perPageCount = $history->count();

        return view('admin.indicator-history.index', [
            'history' => $history,
            'perPageCount' => $perPageCount,
            'totalCount' => $totalCount
        ]);
    }
}
