<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'user_id'=>'nullable',
            'truck_id'=>'nullable',
            'amount'=>'required',
            'description'=>'required',
            'date'=>'required|after_or_equal:today'
        ];
    }
}
