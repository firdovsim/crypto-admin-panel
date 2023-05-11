<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCryptoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'minimum_rsi' => $this->minimum_rsi,
            'maximum_rsi' => $this->maximum_rsi,
            'take_profit' => $this->take_profit,
            'price_precise' => $this->ticker->tickerPrecise->price_precision,
            'quantity' => $this->quantity,
            'interval' => $this->interval,
            'ticker_name' => $this->ticker->name,
            'current_rsi' => $this->ticker->indicator->value,
            'user_id' => $this->user_id,
            'ticker_id' => $this->ticker->id,
            'account' => [
                'api_key_real' => $this->user->api_key_real,
                'api_sec_real' => $this->user->api_sec_real,
                'max_open_orders' => $this->user->max_open_orders
            ]
        ];
    }
}
