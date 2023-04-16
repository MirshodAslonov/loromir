<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
}
