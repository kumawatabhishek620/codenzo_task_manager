@extends('main.master')

@section('content')
<div class="container">
    <h1>Edit Project</h1>

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Project Name</label>
            <input type="text" name="name" class="form-control" value="{{ $project->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $project->start_date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $project->end_date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Duration (Days)</label>
            <input type="number" name="duration" class="form-control" value="{{ $project->duration }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <input type="text" name="client" class="form-control" value="{{ $project->client }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $project->status == '1' ? 'selected' : '' }}>New</option>
                <option value="2" {{ $project->status == '2' ? 'selected' : '' }}>Work Start</option>
                <option value="3" {{ $project->status == '3' ? 'selected' : '' }}>Testing</option>
                <option value="4" {{ $project->status == '4' ? 'selected' : '' }}>Complete</option>
                <option value="5" {{ $project->status == '5' ? 'selected' : '' }}>Reject</option>
                <option value="6" {{ $project->status == '6' ? 'selected' : '' }}>Delete</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Project</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>

    </form>
</div>
@endsection
