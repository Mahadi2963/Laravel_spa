<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    public function run()
    {
        $teacherUser = DB::table('users')->where('role', 'teacher')->first();

        DB::table('teachers')->insert([
            'user_id' => $teacherUser->id,
            'contact' => $teacherUser->contact,
            'teacher_id' => $teacherUser->user_id,
            'teacher_name' => $teacherUser->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}