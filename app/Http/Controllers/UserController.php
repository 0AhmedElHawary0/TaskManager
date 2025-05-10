<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function GetProfile($id)
    {
        $profile = User::find($id)->Profile;
        return response()->json($profile, 200);
    }
}
