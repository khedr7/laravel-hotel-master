<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomsResource extends JsonResource
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
            'id'            => $this->id,
            'price'         => $this->price,
            'status'        => $this->status,
            'description'   => $this->description,
            'beds'          => $this->beds,
            'story'         => $this->story,
            'images'        => $this->getMedia('images')->map(function ($item) {
                return $item->getFullUrl();
            }),
        ];
    }
}
