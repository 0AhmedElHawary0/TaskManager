<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('createTask',[TaskController::class,'store']);
Route::get('tasks',[TaskController::class,'index']);
Route::put('update/{id}',[TaskController::class,'update']);
Route::get('show/{id}',[TaskController::class,'getById']);
Route::delete('delete/{id}',[TaskController::class,'destroy']);
