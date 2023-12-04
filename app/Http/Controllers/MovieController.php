<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Utils\MoviesApi;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $movies = Movie::with('genres')->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Retrieves movies from the API and saves them to the database.
     * and relationship between movies and genres
     */
    public function getMoviesFromApi()
    {
        $genresFromApi = MoviesApi::getAllGenres();
        foreach ($genresFromApi as $genre) {
            if (Genre::where('name', $genre['name'])->exists()) {
                continue;
            }
            Genre::create([
                'name' => $genre['name'],
                'id' => $genre['id'],
            ]);
        }
        $isMoviesCount = Movie::count();
        if ($isMoviesCount > 0) return redirect('/movies');

        $moviesFromApi = MoviesApi::getAllMovies();
        foreach ($moviesFromApi as $movie) {
            $newMovie = Movie::create([
                'name' => $movie['title'],
                'original_language' => $movie['original_language'],
                'original_title' => $movie['original_title'],
                'summary' => $movie['overview'],
                'poster' => "https://image.tmdb.org/t/p/w500/" . $movie['poster_path'],
            ]);
            $newMovie->genres()->attach($movie['genre_ids']);
        }
        $movies = Movie::with('genres')->get();
        return view('movies.index', compact('movies'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::with('genres')->find($id);
        return view('movies.movie', compact('movie'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update The movie
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
