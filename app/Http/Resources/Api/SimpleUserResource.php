<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleUserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
              'id' => $this->id,
              'full_name' => $this->full_name ?? '',
              'phone' => $this->phone,
              'email' => $this->email,
              'identity_number' => $this->identity_number,
              'address' => $this->address,
              'created_at' => $this->custom_created_at,
        ];
    }
}
