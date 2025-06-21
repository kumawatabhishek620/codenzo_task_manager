@extends('main.master')

@section('content')
<div class="container">
    <h1>Add Project</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Project Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Duration (Days)</label>
            <input type="number" name="duration" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <input type="text" name="client" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save Project</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>

    </form>
</div>
@endsection
