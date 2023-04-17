<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    
    protected $table = 'answers';
    
    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id',
       'subject_id',
       'question_id',
       'answer_come',
       'answer_real',
    ];
}
