@extends('main.master')

@section('content')
<div class="container">
    <h2>User Details</h2>

    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Username:</strong> {{ $user->username }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Mobile:</strong> {{ $user->mobile }}</p>
    <p><strong>Status:</strong> {{ $user->status }}</p>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
