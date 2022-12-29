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
              'identity_number' => $this->identity_number,
              'salary' => $this->salary,
              'created_at' => $this->created_at_date,
        ];
    }
}
