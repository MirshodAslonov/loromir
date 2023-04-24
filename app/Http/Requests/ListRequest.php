<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ListRequest extends FormRequest
{
    public function rules()
    {
        return [
            'subject_id'=>'required|exists:subjects,id',
            'project_id'=>'required_if:,|exists:projects,id',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        return abort(404);
    }
}
