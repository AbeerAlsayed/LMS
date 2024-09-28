<?php

namespace Modules\UserManagement\Models;


use Illuminate\Notifications\Notifiable;
use Modules\StudentManagement\Models\Student;
use Modules\TeacherManagement\Models\Teacher;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // 'student', 'teacher', 'parent'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define relationships based on roles
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function parent()
    {
        return $this->hasOne(Parent::class);
    }

    // Example method to check the user's role
    public function isRole($role)
    {
        return $this->role === $role;
    }
    // protected static function newFactory(): UserFactory
    // {
    //     // return UserFactory::new();
    // }
}
