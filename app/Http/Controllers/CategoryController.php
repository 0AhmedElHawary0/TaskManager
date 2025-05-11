<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoryTasks($category)
    {
        $tasks = Category::findOrFail($category)->Tasks;
        return response()->json($tasks, 200);
    }
}
