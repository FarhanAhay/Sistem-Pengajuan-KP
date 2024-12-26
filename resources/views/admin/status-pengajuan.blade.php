@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Status Pengajuan</h2>
        <table class="table">
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
                                <span class="badge badge-warning">Draft</span>
                            @elseif($proposal->status == 'submitted')
                                <span class="badge badge-info">Submitted</span>
                            @elseif($proposal->status == 'accepted')
                                <span class="badge badge-success">Accepted</span>
                            @elseif($proposal->status == 'rejected')
                                <span class="badge badge-danger">Rejected</span>
                            @elseif($proposal->status == 'revision')
                                <span class="badge badge-secondary">Revision</span>
                            @endif

                            <!-- Tombol untuk menerima, menolak, atau meminta revisi -->
                            @if($proposal->status == 'submitted')
                                <form action="{{ route('admin.proposal.accept', $proposal->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                </form>

                                <form action="{{ route('admin.proposal.reject', $proposal->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                </form>

                                <form action="{{ route('admin.proposal.revision', $proposal->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">Revision</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
