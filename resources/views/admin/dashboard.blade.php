@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h3>Welcome to Admin Dashboard</h3>
        </div>
        <div class="card-body">
            <p>Your role is: <strong>{{ auth()->user()->role }}</strong></p>
            <p>Here you can manage the system settings, users, and more.</p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
