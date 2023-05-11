<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClosedOrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'ticker_name' => $this->ticker->name,
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
