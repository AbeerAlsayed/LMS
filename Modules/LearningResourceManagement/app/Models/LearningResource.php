<?php

namespace Modules\LearningResourceManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CourseManagement\Models\Course;

// use Modules\LearningResourceManagement\Database\Factories\LearningFactory;

class LearningResource extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'type',
        'resource_url',
        'description',
    ];

    // Relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // protected static function newFactory(): LearningFactory
    // {
    //     // return LearningFactory::new();
    // }
}
