<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\Dashboard\SimpleUserResource;
use App\Http\Resources\Api\Home\MealResource;
use App\Http\Resources\Api\Home\SlideResource;
use App\Http\Resources\Api\Home\UserInfoResource;
use App\Http\Resources\Api\Home\VideoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
              'id' => $this->id,
              'order_number' => $this->order_number,
              'price' => $this->price,
              'order_weight' => $this->id,
              'order_quantity' => $this->id,
              'moves_number' => $this->id,
              'lat' => $this->lat,
              'lng' => $this->lng,
              'status' => $this->status,
              'customer' => SimpleUserResource::make($this->customer)
        ];
    }
}
