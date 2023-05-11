<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TradeHistory;
use App\Services\StatisticService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private StatisticService $statisticService;

    public function __construct(StatisticService $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index()
    {
        $all_earnings = $this->statisticService->totalEarnings();
        $total_closes = $this->statisticService->totalCloses();
        $today_earnings = $this->statisticService->todayEarnings();
        $today_closes = $this->statisticService->todayCloses();

        return view('admin.index', compact(
            'all_earnings',
            'total_closes',
            'today_earnings',
            'today_closes'
        ));
    }
}
