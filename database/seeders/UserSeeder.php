<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\Hash; 
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    { 
        User::create([ 
            'name' => 'Admin', 
            'email' => 'admin@example.com', 
            'password' => Hash::make('123456789'),
            'is_admin' => 1,
        ]); 
    }
}
