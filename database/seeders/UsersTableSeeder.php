<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'user_id' => '1',
                'email' => 'admin@gmail.com',
                'contact' => '1234567890',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_verified' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Umme Sabiha',
                'user_id' => '1',
                'email' => 'sabiha@gmail.com',
                'contact' => '0987654321',
                'password' => Hash::make('password'),
                'role' => 'teacher',
                'is_verified' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mahadi Hasan',
                'user_id' => '1',
                'email' => 'mahadi@gmail.com',
                'contact' => '01537247119',
                'password' => Hash::make('password'),
                'role' => 'student',
                'is_verified' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
