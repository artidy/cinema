<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Shows extends Controller
{
    public function getFilms(): string
    {
        return 'show films';
    }

    public function getFilmInfo(int $filmId): string
    {
        return "got film by id: $filmId";
    }

    public function getGenres(): string
    {
        return 'get genres';
    }

    public function patchGenre(int $genreId): string
    {
        return "patch genre by id: $genreId";
    }

    public function getEpisodes(int $filmId): string
    {
        return "episodes by film id: $filmId";
    }

    public function getEpisodeInfo(int $episodeId): string
    {
        return "got episode by id: $episodeId";
    }

    public function getEpisodeComments(int $episodeId): string
    {
        return "got comments by episode id: $episodeId";
    }

    public function postEpisodeComment(int $episodeId): string
    {
        return "post comment by episode id: $episodeId";
    }

    public function deleteEpisodeComment(int $episodeId): string
    {
        return "delete comment by episode id: $episodeId";
    }

    public function postFilm(): string
    {
        return 'post film';
    }
}
