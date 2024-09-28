<?php

namespace Modules\CourseManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\CourseManagement\Models\Course;

class CourseController extends Controller
{
    // Display a listing of the courses.
    public function index()
    {
        $courses = Course::with(['teacher.user', 'subject'])->get();
        return response()->json($courses);
    }

    // Show the form for creating a new course.
    public function create()
    {
        // Return view if you're using a form
        return view('courses.create');
    }

    // Store a newly created course in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $course = Course::create($validated);

        return response()->json($course, 201);
    }

    // Display the specified course.
    public function show(Course $course)
    {
        return response()->json($course->load(['teacher.user', 'subject']));
    }

    // Show the form for editing the specified course.
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Update the specified course in storage.
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'sometimes|required|exists:teachers,id',
            'subject_id' => 'sometimes|required|exists:subjects,id',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date',
        ]);

        $course->update($validated);

        return response()->json($course);
    }

    // Remove the specified course from storage.
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(['message' => 'Course deleted successfully']);
    }
}
