<?php

use App\Http\Controllers\Auth;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [Auth::class, 'register']);
Route::post('/login', [Auth::class, 'login']);
Route::post('/logout', [Auth::class, 'logout']);

Route::get('/shows', [Shows::class, 'getFilms']);
Route::post('/shows', [Shows::class, 'postFilm']);
Route::get('/shows/{filmId}', [Shows::class, 'getFilmInfo']);
Route::get('/shows/{filmId}/episodes', [Shows::class, 'getEpisodes']);
Route::get('/genres', [Shows::class, 'getGenres']);
Route::patch('/genres/{id}', [Shows::class, 'patchGenre']);
Route::get('/episode/{id}', [Shows::class, 'getEpisodeInfo']);
Route::get('/episode/{id}/comments', [Shows::class, 'getEpisodeComments']);
Route::post('/episode/{id}/comments/{commentId}', [Shows::class, 'postEpisodeComment'])->whereNumber('commentId');

Route::patch('/user', [UserArea::class, 'updateUser']);
Route::get('/user/shows', [UserArea::class, 'getUserFilms']);
Route::get('/api/user/shows/{filmId}/new-episodes', [UserArea::class, 'getUserNewEpisodes']);
Route::post('/api/user/shows/watch/{filmId}', [UserArea::class, 'addFilmToWatchingList']);
Route::delete('/api/user/shows/watch/{filmId}', [UserArea::class, 'deleteFilmToWatchingList']);
Route::post('/api/user/episodes/watch/{episodeId}', [UserArea::class, 'addEpisodeToWatchingList'])->whereNumber('episodeId');;
Route::delete('/api/user/episodes/watch/{episodeId}', [UserArea::class, 'deleteEpisodeToWatchingList'])->whereNumber('episodeId');;
Route::post('/api/user/shows/{filmId}/vote', [UserArea::class, 'rateFilm']);
