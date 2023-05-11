<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_id' => $this->order_id,
            'ticker_id' => $this->ticker_id,
            'status' => $this->status,
            'avg_price' => $this->avg_price,
            'orig_qty' => $this->orig_qty,
            'side' => $this->side,
            'time' => $this->time,
        ];
    }
}
