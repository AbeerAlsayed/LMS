<?php

namespace Modules\SubjectManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\SubjectManagement\Http\Requests\SubjectRequest;
use Modules\SubjectManagement\Models\Subject;

class SubjectController extends Controller
{
    // Display a list of all subjects
    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects);
    }

    // Store a new subject
    public function store(SubjectRequest  $request)
    {
        $subject = Subject::create($request->validated());
        return response()->json($subject, 201);
    }

    // Show a specific subject
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    // Update a subject
    public function update(SubjectRequest  $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($request->validated());
        return response()->json($subject);
    }

    // Delete a subject
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return response()->json(['message' => 'Subject deleted successfully']);
    }
}
