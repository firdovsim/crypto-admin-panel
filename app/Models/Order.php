<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $ticker
 * @property string $side
 * @property string $order_type
 * @property string $profit
 * @property string $commission
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTickerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $order_id
 * @property int $ticker_id
 * @property string $client_order_id
 * @property string|null $price
 * @property string|null $avg_price
 * @property string $orig_qty
 * @property string|null $executed_qty
 * @property string|null $cum_quote
 * @property string $type
 * @property bool $reduce_only
 * @property bool $close_position
 * @property string|null $stop_price
 * @property string $working_type
 * @property bool $price_protect
 * @property string $orig_type
 * @property string $time
 * @property string $update_time
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAvgPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereClientOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereClosePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCumQuote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereExecutedQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrigQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrigType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePriceProtect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReduceOnly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStopPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWorkingType($value)
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'ticker_id',
        'status',
        'client_order_id',
        'price',
        'avg_price',
        'orig_qty',
        'executed_qty',
        'cum_quote',
        'type',
        'reduce_only',
        'close_position',
        'side',
        'stop_price',
        'working_type',
        'price_protect',
        'orig_type',
        'time',
        'update_time',
        'user_id'
    ];

    public function ticker(): BelongsTo
    {
        return $this->belongsTo(Ticker::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
