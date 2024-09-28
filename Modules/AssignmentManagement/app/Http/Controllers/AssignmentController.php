<?php

namespace Modules\AssignmentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\AssignmentManagement\Models\Assignment;
use Modules\CourseManagement\Models\Course;
use Modules\TeacherManagement\Models\Teacher;

class AssignmentController extends Controller
{
    // Display a listing of the assignments.
    public function index()
    {
        $assignments = Assignment::with('course', 'teacher')->get();
        return response()->json($assignments);
    }

    // Show the form for creating a new assignment.
    public function create()
    {
        $teachers = Teacher::all(); // Fetch all teachers to assign to the assignment
        $courses = Course::all();   // Fetch all courses to assign to the assignment
        return view('assignments.create', compact('teachers', 'courses'));
    }

    // Store a newly created assignment in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id',
            'course_id' => 'required|exists:courses,id',
            'due_date' => 'required|date',
        ]);

        $assignment = Assignment::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'teacher_id' => $validated['teacher_id'],
            'course_id' => $validated['course_id'],
            'due_date' => $validated['due_date'],
        ]);

        return response()->json($assignment, 201);
    }

    // Display the specified assignment.
    public function show(Assignment $assignment)
    {
        return response()->json($assignment->load('teacher', 'course', 'submissions'));
    }

    // Show the form for editing the specified assignment.
    public function edit(Assignment $assignment)
    {
        $teachers = Teacher::all(); // Fetch all teachers to assign to the assignment
        $courses = Course::all();   // Fetch all courses to assign to the assignment
        return view('assignments.edit', compact('assignment', 'teachers', 'courses'));
    }

    // Update the specified assignment in storage.
    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'teacher_id' => 'sometimes|required|exists:teachers,id',
            'course_id' => 'sometimes|required|exists:courses,id',
            'due_date' => 'sometimes|required|date',
        ]);

        $assignment->update($validated);
        return response()->json($assignment);
    }

    // Remove the specified assignment from storage.
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return response()->json(['message' => 'Assignment deleted successfully']);
    }
}
