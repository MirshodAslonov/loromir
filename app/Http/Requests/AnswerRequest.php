<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AnswerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'subject_id'=>'required|exists:subjects,id',
            'project_id'=>'required|exists:projects,id',
            'answer_come'=>'required|',
            'answer_real'=>'required|',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        return abort(404);
    }
}
