<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'total_price' => $this->quantity * $this->dish->price,
            'user' => $this->user,
            'dish' => $this->dish,
        ];
    }
}
