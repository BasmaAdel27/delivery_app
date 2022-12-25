<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules= [
              'first_name' => 'required|min:2|max:255',
              'last_name' => 'required|min:2|max:255',
              'phone'=>'required|numeric',
              'address'=>'required',
        ];
        if (!$this->isMethod('PUT')) {
            $rules['password'] = 'required|min:8|confirmed';
            $rules['email'] = 'required|unique:users,email';
        }else{
            $rules['email'] = 'nullable|unique:users,email,'. $this->admin?->id;
            $rules['password'] = 'nullable|min:8|confirmed';

        }
        return $rules;
    }
}
