<?php declare(strict_types=1);

namespace Api;

use App\Movies\Domain\Movie;
use App\Movies\Domain\MovieApiRepository as MovieApiRepositoryInterface;
use App\Movies\Domain\MovieException;
use Exception;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieApiRepository implements MovieApiRepositoryInterface
{
    private const API_BASE_PATH = 'https://swapi.dev/api/people/';

    public function __construct(private readonly HttpClientInterface $httpClient)
    {
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function fetchMovieByPath(string $path): ?string
    {
        $result = $this->httpClient->request(
            method: 'GET',
            url: $path
        );
        try {
            return $result->getContent();
        } catch (Exception $exception) {
            throw new MovieException($exception->getMessage());
        }
    }
}
