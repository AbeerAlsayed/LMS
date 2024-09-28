<?php

namespace Modules\TeacherManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\TeacherManagement\Models\Teacher;
use Modules\UserManagement\Models\User;

class TeacherController extends Controller
{
    // Display a listing of the teachers.
    public function index()
    {
        $teachers = Teacher::with('user')->get();
        return response()->json($teachers);
    }

    // Show the form for creating a new teacher.
    public function create()
    {
        // Return view if you're using a form
        return view('teachers.create');
    }

    // Store a newly created teacher in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'department' => 'required|string|max:255',
            'hire_date' => 'required|date',
        ]);

        // Create User
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'teacher', // Set role to teacher
        ]);

        // Create Teacher
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'department' => $validated['department'],
            'hire_date' => $validated['hire_date'],
        ]);

        return response()->json($teacher, 201);
    }

    // Display the specified teacher.
    public function show(Teacher $teacher)
    {
        return response()->json($teacher->load('user'));
    }

    // Show the form for editing the specified teacher.
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    // Update the specified teacher in storage.
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $teacher->user->id,
            'password' => 'sometimes|nullable|string|min:8',
            'department' => 'sometimes|required|string|max:255',
            'hire_date' => 'sometimes|required|date',
        ]);

        // Update User
        $teacher->user->update([
            'name' => isset($validated['name']) ? $validated['name'] : $teacher->user->name,
            'email' => isset($validated['email']) ? $validated['email'] : $teacher->user->email,
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $teacher->user->password,
        ]);

        // Update Teacher
        $teacher->update([
            'department' => isset($validated['department']) ? $validated['department'] : $teacher->department,
            'hire_date' => isset($validated['hire_date']) ? $validated['hire_date'] : $teacher->hire_date,
        ]);

        return response()->json($teacher);
    }

    // Remove the specified teacher from storage.
    public function destroy(Teacher $teacher)
    {
        $teacher->user->delete(); // Delete associated user
        $teacher->delete(); // Delete teacher

        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}
