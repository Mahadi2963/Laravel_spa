<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'student_id', 'student_name', 'contact', 'image'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject')
            ->using(StudentSubject::class)
            ->withTimestamps();
    }


    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'marks', 'student_id', 'teacher_id');
    }
}
