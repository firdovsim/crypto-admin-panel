<?php

use App\Http\Controllers\Api\ClosedOrdersController;
use App\Http\Controllers\Api\CryptoController;
use App\Http\Controllers\Api\IndicatorController;
use App\Http\Controllers\Api\OpenOrdersController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\ProxyController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TelegramController;
use App\Http\Controllers\Api\TickerController;
use App\Http\Controllers\Api\TickerPreciseController;
use App\Http\Controllers\Api\TradeHistoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('tickers', TickerController::class);
Route::apiResource('indicators', IndicatorController::class);
Route::apiResource('cryptos', CryptoController::class);
Route::apiResource('proxies', ProxyController::class);
Route::apiResource('settings', SettingController::class)->only('index');
Route::apiResource('trade-history', TradeHistoryController::class);
Route::apiResource('ticker-precise', TickerPreciseController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('open-orders', OpenOrdersController::class)->only('index', 'store');
Route::apiResource('closed-orders', ClosedOrdersController::class)->only('index', 'store');
Route::apiResource('positions', PositionController::class);

Route::post('telegram', [TelegramController::class, 'sendMessage'])->name('telegram.index');
Route::post('telegram/order', [TelegramController::class, 'sendOrderMessage'])->name('telegram.send-order-message');

Route::get('history', [TradeHistoryController::class, 'getHistory']);
