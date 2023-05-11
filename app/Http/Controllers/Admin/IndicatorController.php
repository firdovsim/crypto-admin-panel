<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function index(Request $request)
    {
        $query = Indicator::query();

        if ($request->filled('q')) {
            $name = $request->get('q');
            $query->whereHas('ticker', function ($q) use ($name) {
                return $q->where('name', 'LIKE', "%{$name}%");
            });
        }

        $indicators = $query->with('ticker', 'crypto')
            ->where('value', '>', 0)
            ->orderBy('value', 'DESC')->get();

        $indicators = $indicators->split(3);

        return view('admin.indicators.index', compact('indicators'));
    }
}
