<?php

namespace Modules\ExamManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ExamManagement\Models\Exam;

class ExamController extends Controller
{
    // Display a list of all exams
    public function index()
    {
        $exams = Exam::with('course')->get();
        return response()->json($exams);
    }

    // Store a new exam
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'exam_date' => 'required|date',
            'max_score' => 'required|integer|min:0',
        ]);

        $exam = Exam::create($validated);
        return response()->json($exam, 201);
    }

    // Show a specific exam
    public function show($id)
    {
        $exam = Exam::with('course')->findOrFail($id);
        return response()->json($exam);
    }

    // Update an exam
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'course_id' => 'sometimes|required|exists:courses,id',
            'exam_date' => 'sometimes|required|date',
            'max_score' => 'sometimes|required|integer|min:0',
        ]);

        $exam->update($validated);
        return response()->json($exam);
    }

    // Delete an exam
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return response()->json(['message' => 'Exam deleted successfully']);
    }
}
