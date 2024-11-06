<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'image'];

    // Relationships

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject')
            ->using(StudentSubject::class)
            ->withTimestamps();
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subject')
            ->using(TeacherSubject::class)
            ->withTimestamps();
    }


    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
