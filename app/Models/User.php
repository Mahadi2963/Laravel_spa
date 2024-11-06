<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'user_id',
        'contact',
        'password',
        'role',
        'is_verified'
    ];

    // Constants for roles
    const ROLE_ADMIN = 'admin';
    const ROLE_TEACHER = 'teacher';
    const ROLE_STUDENT = 'student';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Check if user is a student
    public function isStudent()
    {
        return $this->role === self::ROLE_STUDENT;
    }

    // Check if user is a teacher
    public function isTeacher()
    {
        return $this->role === self::ROLE_TEACHER;
    }

    // Relationships
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    protected static function booted()
    {
        parent::booted();

        static::created(function ($user) {
            if ($user->isStudent()) {
                Student::create([
                    'user_id' => $user->id,
                    'student_id' => $user->user_id,
                    'student_name' => $user->name,
                    'contact' => $user->contact,
                    'image' => null,
                ]);
            } elseif ($user->isTeacher()) {
                Teacher::create([
                    'user_id' => $user->id,
                    'teacher_id' => $user->user_id,
                    'teacher_name' => $user->name,
                    'contact' => $user->contact,
                    'image' => null,
                ]);
            }
        });

        static::updated(function ($user) {
            if ($user->isStudent() && !$user->student) {
                Student::create([
                    'user_id' => $user->id,
                    'student_id' => $user->user_id,
                    'student_name' => $user->name,
                    'contact' => $user->contact,
                    'image' => null,
                ]);
            } elseif ($user->isTeacher() && !$user->teacher) {
                Teacher::create([
                    'user_id' => $user->id,
                    'teacher_id' => $user->user_id,
                    'teacher_name' => $user->name,
                    'contact' => $user->contact,
                    'image' => null,
                ]);
            }
        });

        static::deleting(function ($user) {
            if ($user->isStudent()) {
                $user->student->delete();
            } elseif ($user->isTeacher()) {
                $user->teacher->delete();
            }
        });
    }
}