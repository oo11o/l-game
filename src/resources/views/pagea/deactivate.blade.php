@extends('layouts.app')

@section('title', 'Deactivate Link: ' . $link->slug)

@section('header', 'Deactivate Link')

@section('content')
    <div class="card p-4 shadow-sm">
        <h2 class="mb-4">Deactivate Link: {{ $link->slug }}</h2>

        <p class="alert alert-success">
            This link has been deactivated successfully.<br>
            Upon next access, this link will return a 404 error.
        </p>

        <a href="{{ route('registration', ['link' => '/']) }}" class="btn btn-primary">
            Back to Registration
        </a>
    </div>
@endsection
