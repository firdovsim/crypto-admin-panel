<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\TradeHistory
 *
 * @property int $id
 * @property int $ticker_id
 * @property string $trade_id
 * @property string $order_id
 * @property string $side
 * @property string $quantity
 * @property string $commission
 * @property string $realized_pnl
 * @property string $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticker $ticker
 * @method static \Database\Factories\TradeHistoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereRealizedPnl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereTickerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereTradeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TradeHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TradeHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticker_id',
        'trade_id',
        'order_id',
        'side',
        'quantity',
        'commission',
        'realized_pnl',
        'time'
    ];

    public function ticker(): BelongsTo
    {
        return $this->belongsTo(Ticker::class);
    }
}
