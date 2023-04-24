<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoreRequest extends FormRequest
{
    public function rules()
    {
        return [
         'correct' => 'required|',
         'incorrect' => 'required|',
         'count' => 'required|',
        ];
    }
}
