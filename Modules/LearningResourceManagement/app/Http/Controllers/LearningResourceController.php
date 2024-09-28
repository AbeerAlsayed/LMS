<?php

namespace Modules\LearningResourceManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearningResourceController extends Controller
{
    // Display a list of all learning resources
    public function index()
    {
        $learningResources = LearningResource::with('course')->get();
        return response()->json($learningResources);
    }

    // Store a new learning resource
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'type' => 'required|string|max:50',  // e.g., video, pdf, link
            'resource_url' => 'required|string|max:255', // URL or file path to the resource
            'description' => 'nullable|string',
        ]);

        $learningResource = LearningResource::create($validated);
        return response()->json($learningResource, 201);
    }

    // Show a specific learning resource
    public function show($id)
    {
        $learningResource = LearningResource::with('course')->findOrFail($id);
        return response()->json($learningResource);
    }

    // Update a learning resource
    public function update(Request $request, $id)
    {
        $learningResource = LearningResource::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'course_id' => 'sometimes|required|exists:courses,id',
            'type' => 'sometimes|required|string|max:50',
            'resource_url' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $learningResource->update($validated);
        return response()->json($learningResource);
    }

    // Delete a learning resource
    public function destroy($id)
    {
        $learningResource = LearningResource::findOrFail($id);
        $learningResource->delete();
        return response()->json(['message' => 'LearningResource resource deleted successfully']);
    }
}
