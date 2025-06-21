@extends('main.master')

@section('content')
<div class="container">
    <h1>Tasks</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add Task</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filters -->
    <form method="GET" action="{{ route('tasks.index') }}" class="row mb-4">
        <div class="col-md-3">
            <label>Project</label>
            <select name="project_id" class="form-control">
                <option value="">All Projects</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label>User</label>
            <select name="user_id" class="form-control">
                <option value="">All Users</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label>    Priority</label>
            <select name="priority" class="form-control">
                <option value="">All</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>low</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>medium</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>high</option>
            </select>
        </div>

        <div class="col-md-3">
            <label>Date</label>
            <input type="date" name="date" value="{{ request('date') }}" class="form-control">
        </div>

        <div class="col-md-3 mt-4">
            <button type="submit" class="btn btn-success mt-2">Filter</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-2">Reset</a>
        </div>
    </form>

    <!-- Tasks Table -->
    <table class="table table-bordered">
        <tr>
            <th>Project</th>
            <th>User</th>
            <th>Task</th>
            <th>Date</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->project->name ?? '' }}</td>
            <td>{{ $task->user->name ?? '' }}</td>
            <td>{{ $task->task }}</td>
            <td>{{ $task->date }}</td>
            <td>{{ $task->priority }}</td>
            <td>
                @switch($task->status)
                    @case('1') New @break
                    @case('2') Working @break
                    @case('3') Testing @break
                    @case('4') Complete @break
                    @case('5') Deleted @break
                @endswitch
            </td>
            <td>
                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-secondary">View</a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>
@endsection
