<?php

namespace Modules\ClassManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ClassManagement\Http\Requests\ClassRequest;
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

    // Store a newly created class in storage.
    public function store(ClassRequest $request)
    {
        $class = SchoolClass::create($request->validated());
        return response()->json($class, 201);
    }

    // Display the specified class.
    public function show(SchoolClass $class)
    {
        return response()->json($class->load('teacher', 'course', 'attendance'));
    }

    // Update the specified class in storage.
    public function update(ClassRequest $request, SchoolClass $class)
    {
        $class->update($request->validated());
        return response()->json($class);
    }

    // Remove the specified class from storage.
    public function destroy(SchoolClass $class)
    {
        $class->delete();
        return response()->json(['message' => 'Class deleted successfully']);
    }
}
