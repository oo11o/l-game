@extends('layouts.app')

@section('title', 'Generate Link')
@section('header', 'Generate Link')

@section('content')
    <form action="{{ route('registration') }}" method="POST" class="card p-4 shadow-sm bg-white">
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
            @error('username')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phonenumber" class="form-label">Phonenumber</label>
            <input type="text" name="phonenumber" class="form-control" value="{{ old('phonenumber') }}">
            @error('phonenumber')
            <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    @error('general')
        <div class="mt-3 alert alert-danger">{{ $message }}</div>
    @enderror

    @if(!empty($slug))
        <div class="mt-3">
            @include('registration.generated', ['slug' => $slug])
        </div>
    @endif
@endsection
