<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParkingSpotTransformer extends JsonResource
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
          'id'          => $this->id,
          'spot'        => $this->spot,
          'occupied'    => $this->occupied,
          'booked'      => $this->booked,
          'created at'  => $this->created_at,
          'updated at'  => $this->updated_at,
        ];
    }
}
