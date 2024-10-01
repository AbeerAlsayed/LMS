<?php

namespace Modules\StudentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\StudentManagement\Http\Requests\StudentRequest;
use Modules\StudentManagement\Models\Student;
use Modules\UserManagement\Models\User;

class StudentController extends Controller
{
    // Display a listing of the students.
    public function index()
    {
        $students = Student::with('user')->get();
        return response()->json($students);
    }

    // Store a newly created student in storage.
    public function store(StudentRequest $request)
    {
        // Create User
        $user = User::create($request->validated());

        // Create Student
        $student = Student::create([
            'user_id' => $user->id,
            'grade_level' => $validated['grade_level'],
            'enrollment_date' => $validated['enrollment_date'],
        ]);

        return response()->json($student, 201);
    }

    // Display the specified student.
    public function show(Student $student)
    {
        return response()->json($student->load('user'));
    }

    // Show the form for editing the specified student.
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update the specified student in storage.
    public function update(StudentRequest $request, Student $student)
    {
        $student->user->update($request->validated());

        // Update Student
        $student->update([
            'grade_level' => isset($validated['grade_level']) ? $validated['grade_level'] : $student->grade_level,
            'enrollment_date' => isset($validated['enrollment_date']) ? $validated['enrollment_date'] : $student->enrollment_date,
        ]);

        return response()->json($student);
    }

    // Remove the specified student from storage.
    public function destroy(Student $student)
    {
        $student->user->delete(); // Delete associated user
        $student->delete(); // Delete student

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
