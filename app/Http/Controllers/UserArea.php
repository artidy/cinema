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

    public function getUserNewEpisodes(): string
    {
        return 'get user new episodes';
    }

    public function addFilmToWatchingList(): string
    {
        return 'film was added to watching list';
    }

    public function removeFilmToWatchingList(): string
    {
        return 'film was removed from watching list';
    }

    public function addEpisodeToWatchingList(): string
    {
        return 'episode was added to watching list';
    }

    public function removeEpisodeToWatchingList(): string
    {
        return 'episode was removed from watching list';
    }

    public function rateFilm(): string
    {
        return 'film was rated';
    }
}
