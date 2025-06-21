@extends('main.master')

@section('content')
<div class="container">
    <h1>Project Details</h1>

    <div class="card">
        <div class="card-body">

            <h3 class="card-title">{{ $project->name }}</h3>

            <p class="card-text"><strong>Description:</strong> {{ $project->description }}</p>
            <p class="card-text"><strong>Start Date:</strong> {{ $project->start_date }}</p>
            <p class="card-text"><strong>End Date:</strong> {{ $project->end_date }}</p>
            <p class="card-text"><strong>Duration:</strong> {{ $project->duration }} days</p>
            <p class="card-text"><strong>Client:</strong> {{ $project->client }}</p>
            <p class="card-text">
                <strong>Status:</strong>
                @switch($project->status)
                    @case('1') New @break
                    @case('2') Work Start @break
                    @case('3') Testing @break
                    @case('4') Complete @break
                    @case('5') Reject @break
                    @case('6') Deleted @break
                @endswitch
            </p>

            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>

        </div>
    </div>
</div>
@endsection
