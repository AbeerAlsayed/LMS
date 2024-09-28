<?php

namespace Modules\ClassManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ClassManagement\Models\SchoolClass;
use Modules\CourseManagement\Models\Course;
use Modules\TeacherManagement\Models\Teacher;

class ClassController extends Controller
{
    // Display a listing of the classes.
    public function index()
    {
        $classes = SchoolClass::with('teacher', 'course')->get();
        return response()->json($classes);
    }

    // Show the form for creating a new class.
    public function create()
    {
        $teachers = Teacher::all(); // Fetch all teachers
        $courses = Course::all();   // Fetch all courses
        return view('classes.create', compact('teachers', 'courses'));
    }

    // Store a newly created class in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'course_id' => 'required|exists:courses,id',
            'class_time' => 'required|string|max:255',  // Can be date or time depending on need
            'location' => 'required|string|max:255',
        ]);

        $class = SchoolClass::create([
            'teacher_id' => $validated['teacher_id'],
            'course_id' => $validated['course_id'],
            'class_time' => $validated['class_time'],
            'location' => $validated['location'],
        ]);

        return response()->json($class, 201);
    }

    // Display the specified class.
    public function show(SchoolClass $class)
    {
        return response()->json($class->load('teacher', 'course', 'attendance'));
    }

    // Show the form for editing the specified class.
    public function edit(SchoolClass $class)
    {
        $teachers = Teacher::all(); // Fetch all teachers
        $courses = Course::all();   // Fetch all courses
        return view('classes.edit', compact('class', 'teachers', 'courses'));
    }

    // Update the specified class in storage.
    public function update(Request $request, SchoolClass $class)
    {
        $validated = $request->validate([
            'teacher_id' => 'sometimes|required|exists:teachers,id',
            'course_id' => 'sometimes|required|exists:courses,id',
            'class_time' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
        ]);

        $class->update($validated);
        return response()->json($class);
    }

    // Remove the specified class from storage.
    public function destroy(SchoolClass $class)
    {
        $class->delete();
        return response()->json(['message' => 'Class deleted successfully']);
    }
}
