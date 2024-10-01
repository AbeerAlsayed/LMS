<?php

namespace Modules\ParentManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ParentManagement\Http\Requests\ParentRequest;

class ParentController extends Controller
{
    public function index()
    {
        $parents = Parent::all();
        return response()->json($parents);
    }

    public function store(ParentRequest $request)
    {
        $parent = Parent::create($request->validated());
        return response()->json($parent, 201);
    }

    public function show($id)
    {
        $parent = Parent::findOrFail($id);
        return response()->json($parent);
    }

    public function update(ParentRequest $request, $id)
    {
        $parent = Parent::findOrFail($id);
        $parent->update($request->validated());
        return response()->json($parent);
    }

    public function destroy($id)
    {
        $parent = Parent::findOrFail($id);
        $parent->delete();
        return response()->json(null, 204);
    }
}
