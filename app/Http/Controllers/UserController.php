<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('user_id', 'desc')->get();
        return view('welcome', compact('users'));
    }
    public function store(Request $request)
    {
        $id = $request['user_id'];
        if ($id) {
            $user = User::findOrFail($id);
        } else {
            $user = new User();
        }

        if ($request->has('user_password')) {
            $request['user_ipassword'] = $request['user_password'];
        }

        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'user_mobile' => 'required',
            'user_city' => 'required',
            'user_password' => 'required',
            'user_ipassword' => 'required',
        ]);
        if (!$id || $request->has('user_password')) {
            $validated['user_password'] = bcrypt($validated['user_password']);
        } else {
            unset($validated['user_password']);
        }
        if ($id) {
            $user->update($validated);
        } else {
            $user = User::create($validated);
        }
        return response()->json([
            'message' => $id ? 'User updated successfully!' : 'User created successfully!',
            'redirect' => '/',
            'data' => $user,
        ], 201);
    }
    public function edit(string $id)
    {
        $user = User::where('user_id', $id)->first();
        return view('create', compact('user'));
    }
    public function destroy(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::where('user_id', $user_id)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully!',
            'type' => 'danger',
            'redirect' => '/' 
        ], 200);
    }

}
