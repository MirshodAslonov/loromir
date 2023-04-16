<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    
    public function run(): void
    {
        Subject::create([
            'name' => 'Mathematics'
         ]);
 
        Subject::create([
             'name' => 'Physic'
          ]);
 
        Subject::create([
             'name' => 'English'
          ]);
 
        Subject::create([
             'name' => 'PHP Language'
          ]);

        Subject::create([
             'name' => 'C++ Language'
          ]);
          
        Subject::create([
             'name' => 'OOP Basics'
          ]);
    }
}
