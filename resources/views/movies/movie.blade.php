@extends('layouts.landing')
@section('title', 'movie')


@section('content')
    <h2>Movie</h2>
    <div class="container grid-cards">
        <div class="grid">
            <div>
                <img src="{{ $movie->poster }}" alt="">
            </div>
            <div>
                <form method="POST" action="{{ route('movies.update', $movie->id) }}">
                    @method('PUT')
                    @csrf
                    <label for="name">
                        title
                        <input type="text" id="name" name="name" required value="{{ $movie->name }}">
                    </label>

                    <label for="original_language">
                        original language
                        <input type="text" id="original_language" name="original_language" required
                            value="{{ $movie->original_language }}">
                    </label>

                    <label for="originalTitle">
                        original title
                        <input type="text" id="original_title" name="original_title" required
                            value="{{ $movie->original_title }}">
                    </label>

                    <label for="summary">
                        summary
                        <textarea id="summary" name="summary" rows="7" cols="50">{{ $movie->summary }}</textarea>
                    </label>

                    @foreach ($movie->genres as $genre)
                        <span style="background-color: rgba(245, 245, 220, 0.26)">{{ $genre->name }}</span>
                    @endforeach

                    <br>
                    <br>
                    <button>save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
