@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Proposals</h2>

        <table class="table mb-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proposals as $proposal)
                    <tr>
                        <td>{{ $proposal->title }}</td>
                        <td>{{ ucfirst($proposal->status) }}</td>
                        <td>
                            @if($proposal->status == 'draft')
                                <!-- Form untuk submit proposal -->
                                <form action="{{ route('proposals.submit', $proposal->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </form>
                            @else
                                <a href="{{ route('proposals.show', $proposal->id) }}" class="btn btn-info btn-sm">View</a>
                            @endif

                            <!-- Tombol Edit -->
                            <a href="{{ route('proposals.edit', $proposal->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Form untuk menghapus proposal -->
                            <form action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol untuk membuat proposal baru di kanan atas -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('proposals.create') }}" class="btn btn-primary">Create New Proposal</a>
        </div>
    </div>
@endsection
