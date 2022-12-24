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
              'truck_type' => 'required',
              'truck_model' => 'required',
              'License_expiry'=>'required|after_or_equal:'.$dt,
                'operating_card'=>'required',
              'operating_cardDate'=>'required',
              'application_date'=>'required',
              'Examination_date'=>'required',

        ];
        if (!$this->isMethod('PUT')) {
            $rules['plate_number']='required|unique:trucks';
            $rules['license_number'] = 'required|numeric|unique:trucks';
        }else{
            $rules['plate_number']='required|unique:trucks,plate_number,'. $this->truck?->id;
            $rules['license_number'] = 'required|numeric|unique:trucks,license_number,'. $this->truck?->id;
        }
        return $rules;
    }
}
