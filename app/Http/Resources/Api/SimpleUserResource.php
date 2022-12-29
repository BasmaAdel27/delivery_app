<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleUserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
              'id' => $this->id,
              'full_name' => $this->fullname ?? '',
              'phone' => $this->phone,
              'address' => $this->address,
              'created_at' => $this->created_at_date,
        ];
    }
}
