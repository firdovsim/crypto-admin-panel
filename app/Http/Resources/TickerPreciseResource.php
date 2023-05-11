<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TickerPreciseResource extends JsonResource
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
            'ticker_id' => $this->ticker_id,
            'price_precision' => $this->price_precision,
            'quantity_precision' => $this->quantity_precision,
            'created_at' => $this->created_at
        ];
    }
}
