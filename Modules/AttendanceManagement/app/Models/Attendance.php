<?php

namespace Modules\AttendanceManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ClassManagement\Models\SchoolClass;
use Modules\StudentManagement\Models\Student;

// use Modules\AttendanceManagement\Database\Factories\AttendanceFactory;

class Attendance extends Model
{

    protected $fillable = [
        'student_id',
        'class_id',
        'attendance_date',
        'is_present',
    ];

    // Relationship with Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relationship with Class model
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

// protected static function newFactory(): AttendanceFactory
    // {
    //     // return AttendanceFactory::new();
    // }
}
