<?php

namespace Modules\TeacherManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\TeacherManagement\Http\Requests\TeacherRequest;
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

    // Store a newly created teacher in storage.
    public function store(TeacherRequest  $request)
    {
        // Create User
        $user = User::create($request->validated());

        // Create Teacher
        $teacher = Teacher::create([
            'user_id' => $user->id,
            'department' => $request->department,
            'hire_date' => $request->hire_date,
        ]);

        return response()->json($teacher, 201);
    }

    // Display the specified teacher.
    public function show(Teacher $teacher)
    {
        return response()->json($teacher->load('user'));
    }

    // Update the specified teacher in storage.
    public function update(TeacherRequest  $request, Teacher $teacher)
    {

        // Update User
        $teacher->user->update($request->validated());

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
