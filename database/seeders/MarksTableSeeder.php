<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarksTableSeeder extends Seeder
{
    public function run()
    {
        $student = DB::table('students')->first();
        $teacher = DB::table('teachers')->first();
        $subject = DB::table('subjects')->first();

        DB::table('marks')->insert([
            [
                'student_id' => $student->id,
                'subject_id' => $subject->id,
                'teacher_id' => $teacher->id,
                'subject_name' => $subject->name,
                'predicted_marks' => '0',
                'final_grade' => '0',
                'present_count' => '20',
                'absent_count' => '5',
                'classTest_1' => '18',
                'Lab_Test1' => '17',
                'mid_mark' => '19',
                'classTest_2' => '16',
                'Lab_Test2' => '15',
                'assignment' => '14',
                'external_activity' => '13',
                'recommendations' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
