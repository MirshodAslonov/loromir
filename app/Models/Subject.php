<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    
    protected $primaryKey = 'id';

    protected $fillable = [
       'name',
       'number',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class,'subject_id','id');
    }
}
