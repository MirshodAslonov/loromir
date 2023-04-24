<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ResultRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:subjects,id',
            'count' => 'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        return abort(404);
    }
}
