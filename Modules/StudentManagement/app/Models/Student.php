<?php

namespace Modules\StudentManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AssignmentManagement\Models\Assignment;
use Modules\AttendanceManagement\Models\Attendance;
use Modules\ClassManagement\Models\SchoolClass;
use Modules\CourseManagement\Models\Course;
use Modules\EnrollmentManagement\Models\Enrollment;
use Modules\ExamManagement\Models\Exam;
use Modules\GradeManagement\Models\Grade;
use Modules\NotificationManagement\Models\Notification;
use Modules\ParentManagement\Models\Parent;
use Modules\UserManagement\Models\User;

// use Modules\StudentManagement\Database\Factories\StudentFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grade_level', // Example: "9th Grade", "10th Grade", etc.
        'enrollment_date', // When the student enrolled
    ];

    // Relation to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Additional relationships (e.g., enrollments, attendance, grades) can be added here
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    // Relationship to Assignments with Submissions (Many-to-Many)
    public function submissions()
    {
        return $this->belongsToMany(Assignment::class, 'assignment_student')
            ->withPivot('submission_file', 'submitted_at', 'grade')
            ->withTimestamps();
    }
    // protected static function newFactory(): StudentFactory
    // {
    //     // return StudentFactory::new();
    // }
}
