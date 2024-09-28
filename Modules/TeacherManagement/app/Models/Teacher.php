<?php

namespace Modules\TeacherManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ClassManagement\Models\SchoolClass;
use Modules\CourseManagement\Models\Course;
use Modules\UserManagement\Models\User;

// use Modules\TeacherManagement\Database\Factories\TeacherFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department',  // Optional: department or subject specialization
        'hire_date',   // Date the teacher was hired
    ];

    // Relationship to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Teacher can have many courses
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // Teacher can have many classes
    public function classes()
    {
        return $this->hasMany(SchoolClass::class);
    }
    // protected static function newFactory(): TeacherFactory
    // {
    //     // return TeacherFactory::new();
    // }
}
