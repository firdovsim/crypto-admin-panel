<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TradeHistoryResource extends JsonResource
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
            'ticker_name' => $this->ticker->name,
            'trade_id' => $this->trade_id,
            'order_id' => $this->order_id,
            'side' => $this->side,
            'quantity' => $this->quantity,
            'commission' => $this->commission,
            'realized_pnl' => $this->realized_pnl,
            'time' => Carbon::createFromTimestampMs($this->time)->format('H:i:s'),
        ];
    }
}
