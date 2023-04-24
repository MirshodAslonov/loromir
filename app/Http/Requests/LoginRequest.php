<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
{
    public function rules()
    {

        return [
            'email'=>'string|required|exists:users,email',
            'password'=>'required|string|min:4'
        ];
    }
    // protected function failedValidation(Validator $validator)
    // {
    //     return abort(404);
    // }
}
