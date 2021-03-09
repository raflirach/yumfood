<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
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
            'name' => $this->name,
            'logo' => $this->logo,
            'tags' => TagResource::collection($this->tags),
            'dishes' => "http://127.0.0.1:8000/api/v1/vendors/{$this->id}/dishes",
        ];
    }
}
