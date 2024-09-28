<?php

namespace Modules\AssignmentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CourseManagement\Models\Course;
use Modules\StudentManagement\Models\Student;
use Modules\TeacherManagement\Models\Teacher;

// use Modules\AssignmentManagement\Database\Factories\AssignmentFactory;

class Assignment extends Model
{

    use HasFactory;

    protected $fillable = [
        'course_id',
        'teacher_id',
        'title',
        'description',
        'due_date',
    ];

    // Relationship to Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship to Teacher model
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Relationship to Student Assignments (tracking submission)
    public function submissions()
    {
        return $this->belongsToMany(Student::class, 'assignment_student')
            ->withPivot('submission_file', 'submitted_at', 'grade')
            ->withTimestamps();
    }
    // protected static function newFactory(): AssignmentFactory
    // {
    //     // return AssignmentFactory::new();
    // }
}
