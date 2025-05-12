<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|string|confirmed|min:8'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->passowrd)
        ]);
        return response()->json([
            'message'=>'User registered successfully!',
            'User'=> $user
        ], 200);
    }





    public function GetProfile($id)
    {
        $profile = User::findOrFail($id)->Profile;
        return response()->json($profile, 200);
    }
    public function GetUserTasks($id)
    {
        $tasks=User::findOrFail($id)->Tasks;
        return response()->json($tasks, 200);
    }
}
