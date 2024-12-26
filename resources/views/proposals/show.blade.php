@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $proposal->title }}</h2>
        <p>Status: {{ ucfirst($proposal->status) }}</p>
        <p>{{ $proposal->description }}</p>
        <a href="{{ route('proposals.index') }}" class="btn btn-primary">Back to Proposals</a>
    </div>
@endsection
