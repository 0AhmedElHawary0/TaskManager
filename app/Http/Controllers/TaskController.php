<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks,200);
    }
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return response()->json($task,201);
    }
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $vaildatedData = $request->validate([
            'title'=>'sometimes|string|max:250',
            'description'=>'sometimes|string',
            'priority'=>'sometimes|integer|min:1|max:5'
        ]);
        $task->update($vaildatedData);
        return response()->json($task,200);
    }
    public function getById($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task, 200);
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null,204);
    }
}
