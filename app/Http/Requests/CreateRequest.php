<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'a'=>'required|string',
            'b'=>'required|string',
            'c'=>'required|string',
            'd'=>'required|string',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        return abort(404);
    }
}
