<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    
    protected $primaryKey = 'id';

    protected $fillable = [
       'subject_id',
       'number',
       'question',
       'a',
       'b',
       'c',
       'd',
    ];
}
