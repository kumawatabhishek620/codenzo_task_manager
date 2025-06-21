@extends('main.master')

@section('content')
<div class="container">
    <h1>Task Details</h1>

    <div class="card">
        <div class="card-body">

            <h3>{{ $task->task }}</h3>

            <p><strong>Project:</strong> {{ $task->project->name ?? '' }}</p>
            <p><strong>User:</strong> {{ $task->user->name ?? '' }}</p>
            <p><strong>Date:</strong> {{ $task->date }}</p>
            <p><strong>Description:</strong> {{ $task->description }}</p>
            <p><strong>Timing Duration:</strong> {{ $task->timing_duration }} minutes</p>
            <p><strong>Priority:</strong> {{ $task->priority }}</p>
            <p><strong>Status:</strong>
                @switch($task->status)
                    @case('1') New @break
                    @case('2') Working @break
                    @case('3') Testing @break
                    @case('4') Complete @break
                    @case('5') Deleted @break
                @endswitch
            </p>

            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>

        </div>
    </div>
</div>
@endsection
