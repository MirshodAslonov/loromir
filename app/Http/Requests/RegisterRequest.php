<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
           'name'=>'required|string',
           'email'=>'required|email|unique:users,email',
           'phone'=>'required|numeric|unique:users,phone',
           'password'=>'required|string|min:4',
        ];
    }
}
