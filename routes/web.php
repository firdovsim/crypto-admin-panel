<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CryptoController;
use App\Http\Controllers\Admin\CryptoStatusController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\IndicatorController;
use App\Http\Controllers\Admin\LoadController;
use App\Http\Controllers\Admin\OpenOrdersController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\ProxyController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TelegramController;
use App\Http\Controllers\Admin\TestingController;
use App\Http\Controllers\Admin\TickerController;
use App\Http\Controllers\Admin\TradeHistoryController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\IndicatorHistoryController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('/', IndexController::class)->only('index');
        Route::resource('tickers', TickerController::class);
        Route::resource('indicators', IndicatorController::class);
        Route::resource('indicator-history', IndicatorHistoryController::class);
        Route::resource('cryptos', CryptoController::class);
        Route::resource('cryptos-status', CryptoStatusController::class)->only('store');
        Route::resource('orders', OrderController::class);
        Route::resource('open-orders', OpenOrdersController::class)->only('index');
        Route::resource('settings', SettingController::class);
        Route::resource('proxy', ProxyController::class);
        Route::resource('users', UsersController::class);
        Route::resource('trade-history', TradeHistoryController::class);
        Route::resource('incomes', IncomeController::class);
        Route::resource('statistics', StatisticController::class);
        Route::resource('positions', PositionController::class);

        Route::get('configurations', [ConfigurationController::class, 'index'])->name('configurations.index');
        Route::post('configurations/indicator', [ConfigurationController::class, 'configureIndicator'])->name('configurations.indicator');
        Route::post('configurations/quantity', [ConfigurationController::class, 'configureQuantity'])->name('configurations.quantity');
        Route::post('configurations/take_profit', [ConfigurationController::class, 'configureTakeProfit'])->name('configurations.take_profit');

        Route::post('load-defaults', [LoadController::class, 'loadDefaults'])->name('loadDefaults');

        Route::get('testing', [TestingController::class, 'index'])->name('testing.index');
        Route::post('testing/telegram', [TestingController::class, 'telegram'])->name('testing.telegram');
        Route::post('testing/binance', [TestingController::class, 'binance'])->name('testing.binance');
        Route::post('testing/sockets', [TestingController::class, 'sockets'])->name('testing.sockets');
        Route::post('testing/indicator', [TestingController::class, 'indicator'])->name('testing.indicator');

        Route::get('telegram', [TelegramController::class, 'index'])->name('telegram.index');
        Route::post('telegram/chat', [TelegramController::class, 'storeChat'])->name('telegram.storeChat');
        Route::post('telegram/bot', [TelegramController::class, 'storeBot'])->name('telegram.storeBot');
        Route::delete('telegram/chat/{telegraphChat}', [TelegramController::class, 'destroyChat'])->name('telegram.destroyChat');
        Route::delete('telegram/bot/{telegraphBot}', [TelegramController::class, 'destroyBot'])->name('telegram.destroyBot');
    });
    Route::get('login', [LoginController::class, 'showLoginForm']);
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
