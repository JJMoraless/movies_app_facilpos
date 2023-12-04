<article class="card">
    <img src="{{ $movieImage }}" class="card-img-top" alt="img-movie">

    <body class="card-body">
        <p class="card-text">{{ $movieInfo }}</p>
        <div class="card-movie__genres">{{ $movieGenres }}</div>
    </body>

    <footer class="card-button">

        <form method="GET" action="{{ route('movies.show', $movieId) }}">
            @csrf
            <button>edit</button>
        </form>

        <form method="POST" action="{{ route('movies.destroy', $movieId) }}">
            @csrf
            @method('DELETE')
            <button>delete</button>
        </form>
    </footer>

</article>
