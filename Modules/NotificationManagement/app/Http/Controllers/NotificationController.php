<?php

namespace Modules\NotificationManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\NotificationManagement\Models\Notification;

class NotificationController extends Controller
{
    // Display a list of notifications for a specific user
    public function index($userId)
    {
        $notifications = Notification::where('user_id', $userId)->get();
        return response()->json($notifications);
    }

    // Store a new notification
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'is_read' => 'boolean',
        ]);

        $notification = Notification::create($validated);
        return response()->json($notification, 201);
    }

    // Show a specific notification
    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        return response()->json($notification);
    }

    // Mark a notification as read or unread
    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $validated = $request->validate([
            'is_read' => 'required|boolean',
        ]);

        $notification->update($validated);
        return response()->json($notification);
    }

    // Delete a notification
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return response()->json(['message' => 'Notification deleted successfully']);
    }
}
