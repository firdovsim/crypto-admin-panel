<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Crypto;
use App\Models\Indicator;
use App\Models\IndicatorHistory;
use App\Models\Proxy;
use App\Models\Ticker;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layouts.sidebar', function (\Illuminate\Contracts\View\View $view) {
            $view->with('clientsCount', Client::count());
            $view->with('proxyCount', Proxy::count());
            $view->with('usersCount', User::count());

            $view->with('cryptosCount', Crypto::where('user_id', Auth::id())->count());

            $view->with('tickersCount', Ticker::count());
            $view->with('indicatorsCount', Indicator::count());
            $view->with('indicatorHistoryCount', IndicatorHistory::count());
        });
    }
}
