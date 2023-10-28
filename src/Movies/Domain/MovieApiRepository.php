<?php declare(strict_types=1);

namespace App\Movies\Domain;

interface MovieApiRepository
{
    public function fetchMovieByPath(string $path): ?string;
}
