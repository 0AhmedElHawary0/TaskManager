<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::get('user/{userId}/profile',[UserController::class,'GetProfile']);
Route::get('user/{userId}/tasks',[UserController::class,'GetUserTasks']);

Route::apiResource('tasks',TaskController::class);
Route::get('task/{taskId}/user',[TaskController::class,'GetTaskUser']);
Route::post('tasks/{taskId}/categories',[TaskController::class,'addCategoriesToTask']);
Route::get('tasks/{taskId}/categories',[TaskController::class,'getTaskCategories']);


Route::post('profile',[ProfileController::class, 'Store']);
Route::get('profile/{profileId}',[ProfileController::class,'Show']);
Route::put('update/{profileId}',[ProfileController::class,'Update']);




Route::get('category/{categoryId}/tasks',[CategoryController::class,'getCategoryTasks']);
