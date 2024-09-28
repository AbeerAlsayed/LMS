<?php

namespace Modules\SubjectManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CourseManagement\Models\Course;

// use Modules\SubjectManagement\Database\Factories\SubjectFactory;

class Subject extends Model
{

    protected $fillable = [
        'name',
        'description',
    ];

    // Relationship with the Course model
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    // protected static function newFactory(): SubjectFactory
    // {
    //     // return SubjectFactory::new();
    // }
}
