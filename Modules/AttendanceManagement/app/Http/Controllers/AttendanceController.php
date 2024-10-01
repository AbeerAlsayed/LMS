<?php

namespace Modules\AttendanceManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\AttendanceManagement\Http\Requests\AttendanceRequest;
use Modules\AttendanceManagement\Models\Attendance;

class AttendanceController extends Controller
{
    // Display a list of all attendance records
    public function index()
    {
        $attendances = Attendance::with('student', 'class')->get();
        return response()->json($attendances);
    }

    // Store a new attendance record
    public function store(AttendanceRequest $request)
    {
        $attendance = Attendance::create($request->validated());
        return response()->json($attendance, 201);
    }

    // Show a specific attendance record
    public function show($id)
    {
        $attendance = Attendance::with('student', 'class')->findOrFail($id);
        return response()->json($attendance);
    }

    // Update an attendance record
    public function update(AttendanceRequest $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->validated());
        return response()->json($attendance);
    }

    // Delete an attendance record
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return response()->json(['message' => 'Attendance record deleted successfully']);
    }
}
