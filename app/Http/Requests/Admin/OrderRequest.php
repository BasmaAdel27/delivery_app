<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'price'=>'required',
            'quantity'=>'required|numeric',
            'weight'=>'required',
            'moves_number'=>'required',
            'customer_id'=>'required',
            'driver_id'=>'required',
              'location'=>'required',
            'lat'=>'required',
            'lng'=>'required',
        ];
    }
}
