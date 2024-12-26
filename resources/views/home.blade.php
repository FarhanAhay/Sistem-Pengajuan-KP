@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (auth()->user()->role === 'admin')
                        @php
                            header('Location: ' . route('admin.dashboard'));
                            exit;
                        @endphp
                    @elseif (auth()->user()->role === 'mahasiswa')
                        @php
                            header('Location: ' . route('mahasiswa.dashboard'));
                            exit;
                        @endphp
                    @else
                        <p>{{ __('Unauthorized access.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
