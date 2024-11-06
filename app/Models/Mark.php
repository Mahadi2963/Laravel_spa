<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'subject_name',
        'predicted_marks',
        'final_grade',
        'present_count',
        'absent_count',
        'classTest_1',
        'Lab_Test1',
        'mid_mark',
        'classTest_2',
        'Lab_Test2',
        'assignment',
        'external_activity',
        'recommendations'
    ];

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}