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
              'company_name' => $this->company_name,
              'contact_number' => $this->contact_number,
              'address' => $this->address,
              'district_name' => $this->district_name,
              'build_number' => $this->build_number,
              'created_at' => $this->custom_created_at,
        ];
    }
}
