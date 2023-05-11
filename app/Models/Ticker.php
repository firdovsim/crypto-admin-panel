<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Ticker
 *
 * @property int $id
 * @property string $name
 * @property string $ticker
 * @property string|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Indicator|null $indicator
 * @method static \Database\Factories\TickerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker whereTicker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticker whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\TickerPrecise|null $tickerPrecise
 */
class Ticker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ticker', 'price'
    ];

    public function indicator(): HasOne
    {
        return $this->hasOne(Indicator::class, 'ticker_id');
    }

    public function tickerPrecise(): HasOne
    {
        return $this->hasOne(TickerPrecise::class, 'ticker_id');
    }
}
