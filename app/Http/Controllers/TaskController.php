<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoriesToTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->Tasks;
        return response()->json($tasks, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $user_id = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $user_id;
        $task = Task::create($validatedData);
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, int $id)
    {
        $user = Auth::user(); // safer than Auth::user()

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $task = Task::findOrFail($id);
        if ($user->id !== $task->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->update($request->validated());
        return response()->json($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }

    public function getTaskUser($id)
    {
        $user = Task::findOrFail($id)->User;
        return response()->json($user, 200);
    }

    public function addCategoriesToTask(AddCategoriesToTaskRequest $request, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $data = $request->validated();
        $task->Categories()->attach($data['category_id']);
        return response()->json('Category attached successfully!', 200);
    }

    public function getTaskCategories($taskId)
    {
        $categories = Task::findOrFail($taskId)->Categories;
        return response()->json($categories, 200);
    }

    public function getAllTasks()
    {
        $tasks = Task::all();
        return response()->json($tasks, 200);
    }

        public function getTasksByPrioity()
    {
        $tasks = Auth::user()->Tasks()->orderByRaw("FIELD(priority,'high','medium','low')")->get();
        return response()->json($tasks, 200);
    }


    public function addToFavourite($taskId)
    {
        Task::firstOrFail($taskId);
        Auth::user()->FavourtieTasks()->syncWithoutDetaching($taskId);
        return response()->json(['message'=>'Task added to favourites successfully!'], 200);
    }











}
