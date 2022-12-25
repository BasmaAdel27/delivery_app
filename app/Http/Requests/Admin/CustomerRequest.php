<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        $rules= [
              'first_name' => 'required|min:2|string',
              'last_name' => 'required|min:2|string',
               'company_name'=>'required|min:4|string',
               'phone'=>'required|numeric',
               'contact_number'=>'required|numeric',
               'address'=>'required|string',
               'district_name'=>'required|string',
               'build_number'=>'required|numeric'

        ];
        if (!$this->isMethod('PUT')) {
            $rules['commercial_register']='required|unique:customers';
            $rules['tax_number']='required|unique:customers';
        }else{
            $rules['commercial_register']='required|unique:customers,commercial_register,'.$this->customer?->id;
            $rules['tax_number']='required|unique:customers,tax_number,'.$this->customer?->id;
        }
        return $rules;
    }
}
