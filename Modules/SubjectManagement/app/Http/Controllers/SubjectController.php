<?php

namespace Modules\SubjectManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject = Subject::create($validated);
        return response()->json($subject, 201);
    }

    // Show a specific subject
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    // Update a subject
    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subject->update($validated);
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
