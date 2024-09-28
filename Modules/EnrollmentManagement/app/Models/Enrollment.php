<?php

namespace Modules\EnrollmentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CourseManagement\Models\Course;
use Modules\StudentManagement\Models\Student;

// use Modules\EnrollmentManagement\Database\Factories\EnrollmentFactory;

class Enrollment extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'enrollment_date',
    ];

    // Relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // protected static function newFactory(): EnrollmentFactory
    // {
    //     // return EnrollmentFactory::new();
    // }
}
