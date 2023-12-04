<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;

class MoviesApi
{
    private static string $apiKey = "620e0ffa7a40a7dc31d8a2be0d18c5b9";
    private static string $endpointMovies = "https://api.themoviedb.org/3/discover/movie";
    private static string $endpoinGenres = "https://api.themoviedb.org/3/genre/movie/list";


    public static function getAllMovies()
    {
        $response = Http::get(self::$endpointMovies, [
            'api_key' => self::$apiKey,
            'include_video' => false,
            'language' => 'en-US',
            'page' => 1,
            'sort_by' => 'popularity.desc',
        ]);
        $movies = $response->json()['results'];
        return $movies;
    }

    public static function getAllGenres()
    {
        $response = Http::get(self::$endpoinGenres, [
            'api_key' => self::$apiKey,
            'language' => 'en',
        ]);
        $genres = $response->json()['genres'];
        return $genres;
    }
}
