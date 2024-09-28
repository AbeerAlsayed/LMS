<?php

namespace Modules\StudentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    // Show the form for creating a new student.
    public function create()
    {
        // Return view if you're using a form
        return view('students.create');
    }

    // Store a newly created student in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'grade_level' => 'required|string|max:255',
            'enrollment_date' => 'required|date',
        ]);

        // Create User
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'student', // Set role to student
        ]);

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
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $student->user->id,
            'password' => 'sometimes|nullable|string|min:8',
            'grade_level' => 'sometimes|required|string|max:255',
            'enrollment_date' => 'sometimes|required|date',
        ]);

        // Update User
        $student->user->update([
            'name' => isset($validated['name']) ? $validated['name'] : $student->user->name,
            'email' => isset($validated['email']) ? $validated['email'] : $student->user->email,
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $student->user->password,
        ]);

        // Update Student
        $student->update([
            'grade_level' => $validated['grade_level'] ?? $student->grade_level,
            'enrollment_date' => $validated['enrollment_date'] ?? $student->enrollment_date,
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
