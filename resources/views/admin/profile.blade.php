@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Admin Profile</h2>
        <p><strong>Name:</strong> {{ $admin->name }}</p>
        <p><strong>Email:</strong> {{ $admin->email }}</p>
        <p><strong>Role:</strong> Admin</p>
    </div>
@endsection
