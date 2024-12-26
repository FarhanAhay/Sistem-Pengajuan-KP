@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Proposal</h2>

        <form action="{{ route('proposals.update', $proposal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $proposal->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" required>{{ old('description', $proposal->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Proposal</button>
        </form>
    </div>
@endsection
