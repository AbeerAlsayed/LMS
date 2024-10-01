<?php

namespace Modules\CourseManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\CourseManagement\Http\Requests\CourseRequest;
use Modules\CourseManagement\Models\Course;

class CourseController extends Controller
{
    // Display a listing of the courses.
    public function index()
    {
        $courses = Course::with(['teacher.user', 'subject'])->get();
        return response()->json($courses);
    }

    // Store a newly created course in storage.
    public function store( CourseRequest $request)
    {
        $course = Course::create($request->validated());
        return response()->json($course, 201);
    }

    // Display the specified course.
    public function show(Course $course)
    {
        return response()->json($course->load(['teacher.user', 'subject']));
    }

    // Update the specified course in storage.
    public function update( CourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        return response()->json($course);
    }

    // Remove the specified course from storage.
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(['message' => 'Course deleted successfully']);
    }
}
