<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFilmRequest;
use App\Http\Responses\PaginatedResponse;
use App\Jobs\AddFilm;
use App\Models\Comment;
use App\Models\Film;
use Symfony\Component\HttpFoundation\Response;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PaginatedResponse
     */
    public function index(): PaginatedResponse
    {
        return $this->paginate(Film::select(['id', 'title'])->paginate(8));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $filmId
     * @return Response
     */
    public function getFilm(int $filmId): Response
    {
        return $this->success(Film::find($filmId));
    }

    public function getComments(int $filmId): Response
    {
        return $this->success(Film::find($filmId)->comments());
    }

    public function createFilm(AddFilmRequest $request): Response
    {
        AddFilm::dispatch($request->imdbId);

        return $this->created(null);
    }
}
