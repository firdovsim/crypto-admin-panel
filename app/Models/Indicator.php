<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Indicator
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property int $ticker_id
 * @property string $interval
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticker $ticker
 * @method static \Database\Factories\IndicatorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator whereTickerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Indicator whereValue($value)
 * @mixin \Eloquent
 */
class Indicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'ticker_id',
        'interval'
    ];

    public function ticker(): BelongsTo
    {
        return $this->belongsTo(Ticker::class);
    }

    public function crypto()
    {
        return $this->hasOne(Crypto::class, 'ticker_id', 'ticker_id');
    }
}
