<?php

namespace Modules\AssignmentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\AssignmentManagement\Http\Requests\StoreAssignmentRequest;
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

    public function store(StoreAssignmentRequest $request)
    {
        $assignment = Assignment::create($request->validated());

        return response()->json($assignment, 201);
    }


    // Display the specified assignment.
    public function show(Assignment $assignment)
    {
        return response()->json($assignment->load('teacher', 'course', 'submissions'));
    }

    // Update the specified assignment in storage.
    public function update(StoreAssignmentRequest $request, Assignment $assignment)
    {

        $assignment->update($request->validated());
        return response()->json($assignment);
    }

    // Remove the specified assignment from storage.
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return response()->json(['message' => 'Assignment deleted successfully']);
    }
}
