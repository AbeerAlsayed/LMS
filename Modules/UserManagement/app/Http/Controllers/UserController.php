<?php

namespace Modules\UserManagement\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\UserManagement\Http\Requests\UserRequest;
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

    // Store a newly created user in storage.
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json($user, 201);
    }

    // Display the specified user.
    public function show(User $user)
    {
        return response()->json($user);
    }

    // Update the specified user in storage.
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        return response()->json($user);
    }

    // Remove the specified user from storage.
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
