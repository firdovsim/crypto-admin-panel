<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\IndicatorRequest;
use App\Http\Resources\Api\IndicatorResource;
use App\Models\Indicator;
use App\Models\IndicatorHistory;

class IndicatorController extends Controller
{
    public function index()
    {
        $indicators = Indicator::query()
            ->with('ticker')
            ->latest('id')
            ->get();

        return IndicatorResource::collection($indicators);
    }

    public function store(IndicatorRequest $request)
    {
        $indicator = Indicator::query()
            ->where('ticker_id', $request->get('ticker_id'))
            ->where('interval', $request->get('interval'))
            ->first();

        if ($indicator) {
            $indicator->update([
                'value' => $request->get('value')
            ]);
        } else {
            $indicator = Indicator::query()->create($request->all());
        }

        IndicatorHistory::query()->create([
            'indicator_id' => $indicator->id,
            'value' => $request->get('value')
        ]);

        $history = IndicatorHistory::query()->oldest('id')->first();

        if ($history->created_at->diffInMinutes(now()) > 20) {
            $history->delete();
        }

        return IndicatorResource::make($indicator);
    }
}
