<?php

namespace Modules\AssignmentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\AssignmentManagement\Models\Assignment;
use Modules\StudentManagement\Models\Student;

class AssignmentSubmissionController extends Controller
{
    // Method to submit an assignment
    public function submit(Request $request, $assignmentId, $studentId)
    {
        // Validate the request
        $validated = $request->validate([
            'submission_file' => 'required|file|mimes:pdf,docx,txt|max:2048',
            'grade' => 'nullable|numeric|min:0|max:100',
        ]);

        // Find the assignment and student
        $assignment = Assignment::findOrFail($assignmentId);
        $student = Student::findOrFail($studentId);

        // Save the file and get the file path
        $filePath = $request->file('submission_file')->store('submissions', 'public');

        // Attach the student to the assignment in the pivot table with submission details
        $assignment->submissions()->attach($studentId, [
            'submission_file' => $filePath,
            'submitted_at' => now(),
            'grade' => isset($validated['grade']) ? $validated['grade'] : null,
        ]);

        return response()->json(['message' => 'Assignment submitted successfully'], 201);
    }
}
