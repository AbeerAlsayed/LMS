<?php

namespace Modules\AttendanceManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'attendance_date' => 'required|date',
            'is_present' => 'required|boolean',
        ]);

        $attendance = Attendance::create($validated);
        return response()->json($attendance, 201);
    }

    // Show a specific attendance record
    public function show($id)
    {
        $attendance = Attendance::with('student', 'class')->findOrFail($id);
        return response()->json($attendance);
    }

    // Update an attendance record
    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $validated = $request->validate([
            'student_id' => 'sometimes|required|exists:students,id',
            'class_id' => 'sometimes|required|exists:classes,id',
            'attendance_date' => 'sometimes|required|date',
            'is_present' => 'sometimes|required|boolean',
        ]);

        $attendance->update($validated);
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
