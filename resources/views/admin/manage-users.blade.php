@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Users</h2>

    <!-- Tabel daftar pengguna -->
    <table class="table mb-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        <!-- Edit user -->
                        <a href="{{ route('admin.edit-user', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete user -->
                        <form action="{{ route('admin.delete-user', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tombol untuk membuat user baru -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.create-user') }}" class="btn btn-primary">Create New User</a>
    </div>
</div>
@endsection
