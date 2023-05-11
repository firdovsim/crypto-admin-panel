<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Crypto
 *
 * @property int $id
 * @property int $ticker_id
 * @property string $minimum_rsi
 * @property string $maximum_rsi
 * @property string $take_profit
 * @property string $stop_loss
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $quantity
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CryptoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereMaximumRsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereMinimumRsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereStopLoss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereTakeProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereTickerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $interval
 * @property-read \App\Models\Ticker $ticker
 * @method static \Illuminate\Database\Eloquent\Builder|Crypto whereInterval($value)
 */
class Crypto extends Model
{
    use HasFactory;

    protected $perPage = 10;

    protected $fillable = [
        'ticker_id',
        'minimum_rsi',
        'maximum_rsi',
        'quantity',
        'take_profit',
        'user_id',
        'interval',
        'status',
        'stop_loss',
        'is_blocked'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ticker(): BelongsTo
    {
        return $this->belongsTo(Ticker::class);
    }

    public function indicator(): BelongsTo
    {
        return $this->ticker()->with('indicator');
    }

    public function getTakeProfit(): string
    {
        return sprintf("%s USDT", $this->take_profit);
    }
}
