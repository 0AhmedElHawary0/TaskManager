<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Show($id)
    {
        $profile=Profile::where('user_id',$id)->firstOrFail();
        return response()->json($profile, 200);
    }
    public function Store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->validated());
        return response()->json($profile,201);
    }
    public function Update(UpdateProfileRequest $request, $id)
    {
        $profile = Profile::where('user_id',$id)->firstOrFail();
        $profile->Update($request-> validated());
        return response()->json($profile, 200);
    }
}
