<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json([
            'message' => 'User registered successfully!',
            'User' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => "Invalid email or password"], 401);
        } else {
            $user = User::where('email', $request->email)->FirstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'logged in successfully!',
                'user' => $user,
                'token' => $token
            ], 201);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Logged out successfully!'
        ], 200);
    }

    public function GetProfile($id)
    {
        $profile = User::findOrFail($id)->Profile;
        return response()->json($profile, 200);
    }
    public function GetUserTasks($id)
    {
        $tasks = User::findOrFail($id)->Tasks;
        return response()->json($tasks, 200);
    }
}
