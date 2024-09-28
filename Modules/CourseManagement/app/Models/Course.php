<?php

namespace Modules\CourseManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AssignmentManagement\Models\Assignment;
use Modules\EnrollmentManagement\Models\Enrollment;
use Modules\ExamManagement\Models\Exam;
use Modules\StudentManagement\Models\Student;
use Modules\SubjectManagement\Models\Subject;
use Modules\TeacherManagement\Models\Teacher;

// use Modules\CourseManagement\Database\Factories\CourseFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'subject_id',
        'title',
        'description',
        'start_date',
        'end_date',
    ];

    // Relationship with Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Relationship with Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Relationship with Enrollment (students enrolled in the course)
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Relationship with Assignments
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // Relationship with Exams
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    // protected static function newFactory(): CourseFactory
    // {
    //     // return CourseFactory::new();
    // }
}
