<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $studentUser = DB::table('users')->where('role', 'student')->first();

        DB::table('students')->insert([
            'user_id' => $studentUser->id,
            'contact' => $studentUser->contact,
            'student_id' => $studentUser->user_id,
            'student_name' => $studentUser->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}