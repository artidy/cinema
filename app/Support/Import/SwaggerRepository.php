<?php

namespace App\Support\Import;

use App\Models\Film;
use App\Models\Genre;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class SwaggerRepository implements ImportRepository
{
    private const STATUSES = [
        'Ended' => 'ended',
        'Running' => 'running',
        'To Be Determined' => 'pause',
    ];

    public function getFilms(string $imdbId): ?array
    {
        $data = $this->api(['imdbId' => $imdbId]);

        return ['film' => $data, 'genres' => $data['genres']];

        $filmGenres = [];

        foreach ($data['genres'] as $genre) {
            $genre_item = Genre::findOrCreate([
                'title' => $genre
            ]);

            $filmGenres[] = $genre_item->id;
        }

        $film = Film::firstOrNew(['imdb_id' => $imdbId]);
        $film->fill([
            'title' => $data['nameRu'],
            'title_original' => $data['nameOriginal'],
            'poster_image' => $data['posterUrl'],
            'preview_image' => $data['posterUrlPreview'],
            'background_image' => $data['coverUrl'],
            'video_link' => $data['webUrl'],
            'preview_video_link' => $data['webUrl'],
            'description' => strip_tags($data['description']),
            'director' => $data['John Valter'],
            'run_time' => $data['filmLength'],
            'released' => $data['year'],
            'status' => $data['productionStatus'],
        ]);

        return ['film' => $film, 'genres' => $filmGenres];
    }

    private function api(array $params = []): PromiseInterface|Response
    {
        return Http::baseUrl(config('services.swagger.url'))->get('films', $params);
    }
}
