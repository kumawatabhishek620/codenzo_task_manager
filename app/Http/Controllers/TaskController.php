<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasksQuery = Task::where('status', '!=', '5');

        if ($request->filled('project_id')) {
            $tasksQuery->where('project_id', $request->project_id);
        }

        if ($request->filled('user_id')) {
            $tasksQuery->where('user_id', $request->user_id);
        }

        if ($request->filled('date')) {
            $tasksQuery->where('date', $request->date);
        }
        if ($request->filled('priority')) {
            $tasksQuery->where('priority', $request->priority);
        }

        $tasks = $tasksQuery->get();

        $projects = Project::all();
        $users = User::all();

        return view('tasks.index', compact('tasks', 'projects', 'users'));
    }


    public function create()
    {
        $projects = Project::all();
        $users = User::all();

        return view('tasks.create', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'task' => 'required|string',
            'description' => 'required|string',
            'timing_duration' => 'required|integer',
            'priority' => 'required|in:low,medium,high',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();

        return view('tasks.edit', compact('task', 'projects', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'task' => 'required|string',
            'description' => 'required|string',
            'timing_duration' => 'required|integer',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:1,2,3,4,5',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->update(['status' => '5']);
        return redirect()->route('tasks.index')->with('success', 'Task soft-deleted.');
    }
}
