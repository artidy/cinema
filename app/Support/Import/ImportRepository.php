<?php

use Illuminate\Database\Eloquent\Collection;

interface ImportRepository
{
    public function getFilms(string $imdbId): ?Collection;
}
