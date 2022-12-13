<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TruckRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $dt = Carbon::now()->format('Y-m-d');

        $rules= [
              'plate_number' => 'required',
              'truck_type' => 'required',
              'truck_model' => 'required',
              'License_expiry'=>'required|after_or_equal:'.$dt,

        ];
        if (!$this->isMethod('PUT')) {
            $rules['license_number'] = 'required|numeric|unique:trucks';
        }else{
            $rules['license_number'] = 'required|numeric|unique:trucks,license_number,'. $this->truck?->id;
        }
        return $rules;
    }
}
