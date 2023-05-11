<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CryptoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'ticker_name' => $this->ticker->name,
            'current_rsi' => $this->ticker->indicator->value,
            'minimum_rsi' => $this->minimum_rsi,
            'maximum_rsi' => $this->maximum_rsi,
            'take_profit' => $this->take_profit,
            'price_precise' => $this->ticker->tickerPrecise->price_precision,
            'quantity_precise' => $this->ticker->tickerPrecise->quantity_precision,
            'quantity' => $this->quantity,
            'interval' => $this->interval,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
