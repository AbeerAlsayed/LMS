<?php

namespace Modules\GradeManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\GradeManagement\Http\Requests\GradeRequest;
use Modules\GradeManagement\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return response()->json($grades);
    }

    public function store(GradeRequest $request)
    {
        $grade = Grade::create($request->validated());
        return response()->json($grade, 201);
    }

    public function show($id)
    {
        $grade = Grade::findOrFail($id);
        return response()->json($grade);
    }

    public function update(GradeRequest $request, $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->update($request->validated());
        return response()->json($grade);
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return response()->json(null, 204);
    }
}
