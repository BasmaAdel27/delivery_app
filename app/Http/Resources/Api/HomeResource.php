<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\SimpleUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
              'id' => $this->id,
              'order_number' => $this->order_number,
              'price' => $this->price,
              'weight' => $this->weight,
              'quantity' => $this->quantity,
              'moves_number' => $this->moves_number,
              'from' => [
                    'lat' => $this->lat_start,
                    'lng' => $this->lng_start,
                    'address' => $this->address_start
              ],
              'to' => [
                    'lat' => $this->lat_end,
                    'lng' => $this->lng_end,
                    'address' => $this->address_end
              ],
              'order_pocket' => $this->order_pocket,
              'status' => $this->status,
              'status_ar' => $this->status_ar,
              'date' => $this->custom_date,
              'time' => $this->custom_time,
              'customer' => SimpleUserResource::make($this->customer)
        ];
    }
}
