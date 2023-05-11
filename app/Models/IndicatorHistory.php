<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\IndicatorHistory
 *
 * @property int $id
 * @property int $indicator_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Indicator $indicator
 * @method static \Database\Factories\IndicatorHistoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|IndicatorHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IndicatorHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IndicatorHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|IndicatorHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndicatorHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndicatorHistory whereIndicatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndicatorHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IndicatorHistory whereValue($value)
 * @mixin \Eloquent
 */
class IndicatorHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'indicator_id',
        'value'
    ];

    public function indicator(): BelongsTo
    {
        return $this->belongsTo(Indicator::class, 'indicator_id');
    }
}
