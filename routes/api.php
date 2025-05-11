<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('tasks',TaskController::class);

Route::post('profile',[ProfileController::class, 'Store']);
Route::get('profile/{id}',[ProfileController::class,'Show']);
Route::put('update/{id}',[ProfileController::class,'Update']);

Route::get('user/{id}/profile',[UserController::class,'GetProfile']);
Route::get('user/{id}/tasks',[UserController::class,'GetUserTasks']);
Route::get('task/{id}/user',[TaskController::class,'GetTaskUser']);
