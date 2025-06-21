@extends('main.master')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Project</label>
                <select name="project_id" class="form-control" required>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ $task->date }}" required>
            </div>

            <div class="mb-3">
                <label>Task Name</label>
                <input type="text" name="task" class="form-control" value="{{ $task->task }}" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $task->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Timing Duration (Minutes)</label>
                <input type="number" name="timing_duration" class="form-control" value="{{ $task->timing_duration }}"
                    required>
            </div>

            <div class="mb-3">
                <label> Priority</label>
                <select name="priority" class="form-control">
                    <option value="">All</option>
                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>low</option>
                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>medium</option>
                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>high</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="1" {{ $task->status == '1' ? 'selected' : '' }}>New</option>
                    <option value="2" {{ $task->status == '2' ? 'selected' : '' }}>Working</option>
                    <option value="3" {{ $task->status == '3' ? 'selected' : '' }}>Testing</option>
                    <option value="4" {{ $task->status == '4' ? 'selected' : '' }}>Complete</option>
                    <option value="5" {{ $task->status == '5' ? 'selected' : '' }}>Delete</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>

        </form>
    </div>
@endsection
