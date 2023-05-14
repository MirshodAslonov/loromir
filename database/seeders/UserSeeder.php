<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        $check = User::where('phone',0000)->first();
        if (empty($check)){
            $user = new User();
            $user->name = "Admin";
            $user->email = "admin@gmail.com";
            $user->phone = 0000;
            $user->password = bcrypt('0000');
            $user->save();
        }
    }
}
