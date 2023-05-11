<?php

namespace App\Services;

use App\Models\TradeHistory;
use Carbon\Carbon;

class StatisticService
{
    public function totalEarnings(): float
    {
        $trade_history = TradeHistory::query()->get();
        $all_earnings = 0;
        foreach ($trade_history as $trade) {
            $realized_pnl = $trade->realized_pnl;
            $commission = $trade->commission;
            $all_earnings += $realized_pnl - $commission;
        }

        return round($all_earnings, 2);
    }

    public function totalCloses(): float|int
    {
        $trade_history = TradeHistory::query()
            ->distinct()
            ->count();

        return $trade_history / 2;
    }

    public function todayEarnings(): float
    {
        $trade_history = TradeHistory::query()
            ->whereDate('created_at', Carbon::today())
            ->get();
        $today_earnings = 0;
        foreach ($trade_history as $trade) {
            $realized_pnl = $trade->realized_pnl;
            $commission = $trade->commission;
            $today_earnings += $realized_pnl - $commission;
        }

        return round($today_earnings, 2);
    }

    public function todayCloses(): float|int
    {
        $trade_history = TradeHistory::query()
            ->whereDate('created_at', Carbon::today())
            ->distinct()
            ->count();

        return $trade_history / 2;
    }

    public function totalRealizedPnl($trades): float
    {
        $total_earnings = 0;
        foreach ($trades as $trade) {
            $realized_pnl = $trade->realized_pnl;
            $commission = $trade->commission;
            $total_earnings += $realized_pnl - $commission;
        }

        return round($total_earnings, 2);
    }
}
