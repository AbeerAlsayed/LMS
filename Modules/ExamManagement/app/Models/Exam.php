<?php

namespace Modules\ExamManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CourseManagement\Models\Course;
use Modules\StudentManagement\Models\Student;

// use Modules\ExamManagement\Database\Factories\ExamFactory;

class Exam extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'exam_date',
        'max_score',
    ];

    // Relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    // protected static function newFactory(): ExamFactory
    // {
    //     // return ExamFactory::new();
    // }
}
