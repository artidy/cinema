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

    public function patchGenre(int $id): string
    {
        return "patch genre by id: $id";
    }

    public function getEpisodes(int $filmId): string
    {
        return "episodes by film id: $filmId";
    }

    public function getEpisodeInfo(int $id): string
    {
        return "got episode by id: $id";
    }

    public function getEpisodeComments(int $id): string
    {
        return "got comments by episode id: $id";
    }

    public function postEpisodeComment(int $episodeId, int $commentId): string
    {
        return "post comment by episode id: $episodeId, комментарий для ответа: $commentId";
    }

    public function deleteEpisodeComment(int $id): string
    {
        return "delete comment by id: $id";
    }

    public function postFilm(): string
    {
        return 'post film';
    }
}
