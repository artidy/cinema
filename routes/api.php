<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\Shows;
use App\Http\Controllers\UserArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [Auth::class, 'register']);
Route::post('/auth', [Auth::class, 'login']);
Route::get('/users', [Auth::class, 'getUsers']);
Route::post('/user/shows/watch/{filmId}', [UserArea::class, 'addFilmToWatchingList']);
Route::post('/films', [FilmController::class, 'createFilm']);

//Route::middleware('auth:sanctum')->group(function () {
//    Route::post('/logout', [Auth::class, 'logout']);
//
//    Route::get('/films', [FilmController::class, 'index']);
//    Route::post('/films', [FilmController::class, 'createFilm']);
//    Route::get('/films/{filmId}', [FilmController::class, 'getFilm']);
//    Route::get('/films/{filmId}/comments', [CommentController::class, 'index']);
//    Route::post('/films/{filmId}/comments', [CommentController::class, 'addComment']);
//    Route::delete('/films/{filmId}/comments/{commentId}', [CommentController::class, 'deleteComment']);
//    Route::get('/genres', [Shows::class, 'getGenres']);
//    Route::patch('/genres/{id}', [Shows::class, 'patchGenre']);
//
//    Route::patch('/user', [UserArea::class, 'updateUser']);
//    Route::get('/user/shows', [UserArea::class, 'getUserFilms']);
//    Route::get('/user/shows/{filmId}/new-episodes', [UserArea::class, 'getUserNewEpisodes']);
//    Route::post('/user/shows/watch/{filmId}', [UserArea::class, 'addFilmToWatchingList']);
//    Route::delete('/user/shows/watch/{filmId}', [UserArea::class, 'deleteFilmToWatchingList']);
//    Route::post('/user/shows/{filmId}/vote', [UserArea::class, 'rateFilm']);
//});
