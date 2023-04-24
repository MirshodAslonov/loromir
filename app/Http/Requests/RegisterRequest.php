<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

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
    // protected function failedValidation(Validator $validator)
    // {
    //     return abort(404);
    // }
}
