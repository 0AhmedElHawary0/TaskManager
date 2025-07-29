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
Route::post('logout',[UserController::class,'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function()
{
                        /*------------User----------*/
    Route::prefix('user')->group(function()
    {
        Route::get('/{userId}/profile',[UserController::class,'GetProfile']);
        Route::get('/{userId}/tasks',[UserController::class,'GetUserTasks']);
    });
                        /*------------Tasks----------*/
    Route::prefix('tasks')->group(function()
    {
        Route::apiResource('',TaskController::class);
        Route::get('/{taskId}/user',[TaskController::class,'GetTaskUser']);
        Route::post('/{taskId}/categories',[TaskController::class,'addCategoriesToTask']);
        Route::get('/{taskId}/categories',[TaskController::class,'getTaskCategories']);
        Route::get('/getAll',[TaskController::class,'getAllTasks'])->middleware('CheckUser');
        Route::get('/orderedTasks',[TaskController::class,'getTasksByPrioity']);
        Route::post('/{taskId}/favourite',[TaskController::class,'addToFavourite']);
        Route::delete('/{taskId}/favourite',[TaskController::class,'reomveFromFavourite']);
        Route::get('/{userId}/favourite',[TaskController::class,'getFavouriteTasks']);
    });


                        /*------------Profile----------*/
    Route::prefix('profile')->group(function()
    {
        Route::post('',[ProfileController::class,'Store']);
        Route::get('/{profileId}',[ProfileController::class,'Show']);
        Route::put('/{profileId}',[ProfileController::class,'Update']);
    });
                        /*------------Category----------*/
    Route::prefix('category')->group(function()
    {
        Route::get('category/{categoryId}/tasks',[CategoryController::class,'getCategoryTasks']);
    });
});
