<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks,200);
    }
    public function store(Request $request)
    {
        $vaildatedData = $request->validate([
            'title'=>['required|string|max:250'],
            'description'=>['required|string'],
            'priority'=>['required|integer|min:1|max:5']
        ]);
        $task = Task::create($vaildatedData);
        return response()->json($task,$status=201);
    }
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $vaildatedData = $request->validate([
            'title'=>['sometimes|string|max:250'],
            'description'=>['sometimes|string'],
            'priority'=>['sometimes|integer|min:1|max:5']
        ]);
        $task->update($request->only('title','description','priority'));
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
