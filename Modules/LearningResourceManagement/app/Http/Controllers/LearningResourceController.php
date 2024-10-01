<?php

namespace Modules\LearningResourceManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\LearningResourceManagement\Http\Requests\LearningResourceRequest;
use Modules\LearningResourceManagement\Models\LearningResource;

class LearningResourceController extends Controller
{
    // Display a list of all learning resources
    public function index()
    {
        $learningResources = LearningResource::with('course')->get();
        return response()->json($learningResources);
    }

    // Store a new learning resource
    public function store(LearningResourceRequest  $request)
    {
        $learningResource = LearningResource::create($request->validated());
        return response()->json($learningResource, 201);
    }

    // Show a specific learning resource
    public function show($id)
    {
        $learningResource = LearningResource::with('course')->findOrFail($id);
        return response()->json($learningResource);
    }

    // Update a learning resource
    public function update(LearningResourceRequest  $request, $id)
    {
        $learningResource = LearningResource::findOrFail($id);
        $learningResource->update($request->validated());
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
