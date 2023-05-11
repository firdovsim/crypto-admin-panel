<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TickerPrecise extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticker_id',
        'price_precision',
        'quantity_precision'
    ];

    public function ticker(): BelongsTo
    {
        return $this->belongsTo(Ticker::class);
    }
}
