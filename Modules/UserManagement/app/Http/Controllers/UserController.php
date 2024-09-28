<?php

namespace Modules\UserManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\UserManagement\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of the users.
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Show the form for creating a new user.
    public function create()
    {
        // Return view if you are using a form
        return view('users.create');
    }

    // Store a newly created user in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:student,teacher,parent',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return response()->json($user, 201);
    }

    // Display the specified user.
    public function show(User $user)
    {
        return response()->json($user);
    }

    // Show the form for editing the specified user.
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update the specified user in storage.
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8',
            'role' => 'sometimes|required|string|in:student,teacher,parent',
        ]);

        $user->update($validated);
        return response()->json($user);
    }

    // Remove the specified user from storage.
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
