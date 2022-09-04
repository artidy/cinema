<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserArea extends Controller
{
    public function updateUser(): string
    {
        return 'update user';
    }

    public function getUserFilms(): string
    {
        return 'get user films';
    }

    public function getUserNewEpisodes(int $filmId): string
    {
        return "get user new episodes by $filmId";
    }

    public function addFilmToWatchingList(int $filmId): string
    {
        return "film was added to watching list by $filmId";
    }

    public function deleteFilmToWatchingList(int $filmId): string
    {
        return "film was deleted from watching list by $filmId";
    }

    public function addEpisodeToWatchingList(int $episodeId): string
    {
        return "episode was added to watching list by $episodeId";
    }

    public function deleteEpisodeToWatchingList(int $episodeId): string
    {
        return "episode was deleted from watching list by $episodeId";
    }

    public function rateFilm(int $filmId): string
    {
        return "film: $filmId was rated";
    }
}
