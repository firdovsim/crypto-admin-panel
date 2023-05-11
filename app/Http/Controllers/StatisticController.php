<?php

namespace App\Http\Controllers;

use App\Models\TradeHistory;
use App\Services\StatisticService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    private StatisticService $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index()
    {
        $trade_history = TradeHistory::query()
            ->with('ticker')
            ->latest()
            ->get()
            ->groupBy(function ($trade) {
                return Carbon::parse($trade->created_at)->format('d-m-Y');
            }
        );

        $trades_daily = collect();
        foreach ($trade_history as $day => $trades) {
            $trades_daily->push((object) [
                'day' => $day,
                'realized_pnl' => $this->statisticService->totalRealizedPnl($trades),
            ]);
        }

        return view('admin.statistics.index', compact('trades_daily'));
    }
}
