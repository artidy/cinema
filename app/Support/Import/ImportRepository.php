<?php

namespace App\Support\Import;

interface ImportRepository
{
    public function getFilms(string $imdbId): ?array;
}
