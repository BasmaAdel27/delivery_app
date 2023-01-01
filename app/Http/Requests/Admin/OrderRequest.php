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
            'quantity'=>'required',
            'weight'=>'required',
            'moves_number'=>'required|numeric',
            'customer_id'=>'required',
            'driver_id'=>'required',
            'lat_start'=>'required',
            'lng_start'=>'required',
            'address_start'=>'required',
            'lat_end'=>'required',
            'lng_end'=>'required',
            'address_end'=>'required',
            'order_pocket'=>'nullable',
            'product_type'=>'nullable'

        ];
    }
}
