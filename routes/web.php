<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', fn () => redirect('/movies'));
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/tmdb', [MovieController::class, 'getMoviesFromApi'])->name('movies.get');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');
Route::get('/movies/{id}',   [MovieController::class, 'show'])->name('movies.show');
Route::put('movies/{id}',     [MovieController::class, 'update'])->name('movies.update');