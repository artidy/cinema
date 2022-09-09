<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFilmRequest;
use App\Http\Responses\PaginatedResponse;
use App\Jobs\AddFilm;
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
     * @param  Film $film
     * @return Response
     */
    public function show(Film $film): Response
    {
        return $this->success($film);
    }

    public function request(AddFilmRequest $request): Response
    {
        AddFilm::dispatch($request->imdbId);

        return $this->created(null);
    }
}
