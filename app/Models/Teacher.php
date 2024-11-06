<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['user_id', 'teacher_id', 'teacher_name', 'contact', 'image'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject')
            ->using(TeacherSubject::class)
            ->withTimestamps();
    }


    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'marks', 'teacher_id', 'student_id');
    }
}
