<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'phone' => 'required',
            'password' => 'required',
            'firebase_token' => 'nullable|string',
            'device_type' => 'nullable',
            'device_token' => 'nullable'
        ];
    }
}
