<?php

namespace Modules\EnrollmentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EnrollmentManagement\Models\Enrollment;

class EnrollmentController extends Controller
{
    // Display a list of all enrollments
    public function index()
    {
        $enrollments = Enrollment::with('student', 'course')->get();
        return response()->json($enrollments);
    }

    // Store a new enrollment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
        ]);

        $enrollment = Enrollment::create($validated);
        return response()->json($enrollment, 201);
    }

    // Show a specific enrollment
    public function show($id)
    {
        $enrollment = Enrollment::with('student', 'course')->findOrFail($id);
        return response()->json($enrollment);
    }

    // Update an enrollment
    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::findOrFail($id);

        $validated = $request->validate([
            'student_id' => 'sometimes|required|exists:students,id',
            'course_id' => 'sometimes|required|exists:courses,id',
            'enrollment_date' => 'sometimes|required|date',
        ]);

        $enrollment->update($validated);
        return response()->json($enrollment);
    }

    // Delete an enrollment
    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();
        return response()->json(['message' => 'Enrollment deleted successfully']);
    }
}
