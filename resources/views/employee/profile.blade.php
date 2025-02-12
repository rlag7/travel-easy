@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employee Profile</h2>
        <p><strong>Name:</strong> {{ $employee->name }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>Position:</strong> {{ $employee->position ?? 'Not assigned' }}</p>
        <p><strong>Department:</strong> {{ $employee->department ?? 'Not assigned' }}</p>
    </div>
@endsection
