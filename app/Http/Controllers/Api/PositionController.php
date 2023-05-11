<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Ticker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $ticker = Ticker::query()
            ->where('name', $request->get('symbol'))
            ->first();

        $data = $request->all();
        $data['ticker_id'] = $ticker->id;

        $position = Position::query()->firstWhere('ticker_id', $ticker->id);
        if ($position) {
            $position->update($request->all());
        } else {
            $position = Position::query()->create($data);
        }

        return response()->json($position);
    }
}
