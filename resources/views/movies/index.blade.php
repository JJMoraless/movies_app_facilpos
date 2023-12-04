@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.landing')
@section('title', 'movies app')


@section('content')
    <h2>List of movies</h2>
    <div class="container grid-cards">
        @forelse ($movies as $movie)
            @component('_components.cardMovie')
                @slot('movieImage')
                    {{ $movie->poster }}
                @endslot

                @slot('movieInfo')
                    <p>{{ Str::limit($movie->summary, $limit = 90, $end = '...') }}</p>
                @endslot

                @slot('movieGenres')
                    @foreach ($movie->genres as $genre)
                        <span style="background-color: rgba(245, 245, 220, 0.26)">{{ $genre->name }}</span>
                    @endforeach
                @endslot

                @slot('movieId', $movie->id)
            @endcomponent
            @empty
                <h3>movies from api not found</h3>
            @endforelse
        </div>
    @endsection
