<?php

namespace Modules\ClassManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AttendanceManagement\Models\Attendance;
use Modules\CourseManagement\Models\Course;
use Modules\StudentManagement\Models\Student;
use Modules\TeacherManagement\Models\Teacher;

// use Modules\ClassManagement\Database\Factories\ClassFactory;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'course_id',
        'class_time',  // Class schedule or time
        'location',    // Physical or virtual class location
    ];

    // Relationship to Teacher model
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Relationship to Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship to Attendance model (class attendance)
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
    // protected static function newFactory(): ClassFactory
    // {
    //     // return ClassFactory::new();
    // }
}
