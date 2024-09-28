<?php

namespace Modules\GradeManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\StudentManagement\Models\Student;

// use Modules\GradeManagement\Database\Factories\GradeFactory;

class Grade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    // protected static function newFactory(): GradeFactory
    // {
    //     // return GradeFactory::new();
    // }
}
