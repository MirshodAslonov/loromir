<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $table = 'keys';
    
    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id',
       'math',
       'physic',
       'english',
       'logic',
       'php',
       'c++',
       'oop',
    ];
}
