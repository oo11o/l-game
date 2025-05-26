@extends('layouts.app')

@section('title', 'Link: ' . $link->slug)

@section('header', 'Unique Link Manager')

@section('content')
    <div class="card p-4 shadow-sm">
        <h2 class="mb-4">ID: {{ $link->slug }}</h2>

        <div class="d-flex flex-wrap gap-2 justify-content-center">
            {{-- Generate --}}
            <form action="{{ route('link.generate', ['link' => $link->slug]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Generate New Unique Link
                </button>
            </form>

            {{-- Deactivate --}}
            <form action="{{ route('link.deactivate', ['link' => $link->slug]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger">
                    Deactivate This Unique Link
                </button>
            </form>

            {{-- imfeelinglucky --}}
            <form action="{{ route('pagea.imfeelinglucky', ['link' => $link->slug]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">
                    Imfeelinglucky
                </button>
            </form>

            {{-- History --}}
            <a href="{{ route('pagea.history', ['link' => $link->slug]) }}" class="btn btn-secondary">
                History
            </a>
        </div>
    </div>


    @if(!empty($slug))
        <div class="mt-3">
            @include('registration.generated', ['slug' => $slug])
        </div>
    @endif

    @if(!empty($gameResult))
        <div class="mt-3">
            @include('pagea.components.imfeelinglucky', ['gameResult' => $gameResult])
        </div>
    @endif

    @if(!empty($gameResults))
        <div class="mt-3">
            @include('pagea.components.history', ['gameResults' => $gameResults])
        </div>
    @endif

@endsection
