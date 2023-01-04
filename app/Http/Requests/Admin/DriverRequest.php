<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $dt = Carbon::now()->format('Y-m-d');

        $rules= [
              'first_name' => 'required|min:2|max:255',
              'last_name' => 'required|min:2|max:255',
              'license_expiry'=>'required|after_or_equal:'.$dt,
              'phone'=>'required|numeric',
              'address'=>'required',
              'truck_id'=>'nullable',
              'delegation_date'=>'nullable|after_or_equal:'.$dt,
              'card_expiry'=>'nullable|after_or_equal:'.$dt,
              'card'=>'nullable',
              'delegation'=>'nullable',
              'salary'=>'required'

        ];
        if (!$this->isMethod('PUT')) {
            $rules['password'] = 'required|min:6|confirmed';
            $rules['identity_number'] = 'required|min:14|numeric|unique:users';
            $rules['license_number'] = 'required|numeric|unique:users';
            $rules['email'] = 'nullable|unique:users,email';
        }else{
            $rules['identity_number'] = 'required|numeric|min:14|unique:users,identity_number,'. $this->driver?->id;
            $rules['license_number'] = 'required|numeric|unique:users,license_number,'. $this->driver?->id;
            $rules['email'] = 'nullable|unique:users,email,'. $this->driver?->id;
        }
        return $rules;
    }
}
