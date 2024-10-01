<?php

namespace Modules\ExamManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ExamManagement\Http\Requests\ExamRequest;
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
    public function store(ExamRequest $request)
    {
        $exam = Exam::create($request->validated());
        return response()->json($exam, 201);
    }

    // Show a specific exam
    public function show($id)
    {
        $exam = Exam::with('course')->findOrFail($id);
        return response()->json($exam);
    }

    // Update an exam
    public function update(ExamRequest $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update($request->validated());
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
