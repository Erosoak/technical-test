<?php declare(strict_types=1);

namespace Api;

use App\Characters\Domain\Character;
use App\Characters\Domain\CharacterApiRepository as CharacterRepositoryInterface;
use App\Characters\Domain\CharacterException;
use Exception;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CharacterApiRepository implements CharacterRepositoryInterface
{
    private const API_BASE_PATH = 'https://swapi.dev/api/people/';

    public function __construct(private readonly HttpClientInterface $httpClient)
    {
    }

    /**
     * @throws TransportExceptionInterface
     * @throws CharacterException
     */
    public function fetchCharacterWithId(int $id): ?string
    {
        $url = self::API_BASE_PATH . $id;
        $result = $this->httpClient->request(
            method: 'GET',
            url: $url
        );
        try {
            return $result->getContent();
        } catch (Exception $exception) {
            throw new CharacterException($exception->getMessage());
        }
    }

    public function fetchCharactersByQuantity(int $quantity): ?string
    {
        // TODO: Implement fetchCharactersByQuantity() method.
    }
}
