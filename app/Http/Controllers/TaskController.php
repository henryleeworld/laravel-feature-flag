<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;
use Laravel\Pennant\Feature;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (Feature::for(auth()->user()->team)->active('tasks-management')) {
            $tasks = Task::all();
            return view('tasks.index', compact('tasks'));
        } else {
            abort(403);
        }
    }
}
