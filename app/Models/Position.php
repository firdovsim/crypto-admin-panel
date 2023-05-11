<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Position
 *
 * @property int $id
 * @property string $symbol
 * @property string $initial_margin
 * @property string $maint_margin
 * @property string $unrealized_profit
 * @property string $position_initial_margin
 * @property string $open_order_initial_margin
 * @property string $leverage
 * @property bool $isolated
 * @property string $entry_price
 * @property string $max_notional
 * @property string $position_side
 * @property string $position_amt
 * @property string $notional
 * @property string $isolated_wallet
 * @property string $update_time
 * @property string $bid_notional
 * @property string $ask_notional
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PositionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereAskNotional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereBidNotional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereEntryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereInitialMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereIsolated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereIsolatedWallet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereLeverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereMaintMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereMaxNotional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereNotional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereOpenOrderInitialMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position wherePositionAmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position wherePositionInitialMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position wherePositionSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUnrealizedProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Position whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'ticker_id',
        'initial_margin',
        'maint_margin',
        'unrealized_profit',
        'position_initial_margin',
        'open_order_initial_margin',
        'leverage',
        'isolated',
        'entry_price',
        'max_notional',
        'position_side',
        'position_amt',
        'notional',
        'isolated_wallet',
        'update_time',
        'bid_notional',
        'ask_notional',
    ];
}
