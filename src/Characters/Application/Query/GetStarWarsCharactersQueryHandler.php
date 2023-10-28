<?php declare(strict_types=1);

namespace App\Characters\Application\Query;

use App\Characters\Domain\Character;
use App\Characters\Domain\CharacterApiRepository;
use App\Movies\Domain\Movie;
use App\Movies\Domain\MovieApiRepository;
use App\Shared\Application\QueryHandlerInterface;

class GetStarWarsCharactersQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private readonly CharacterApiRepository $characterApiRepository,
        private readonly MovieApiRepository $movieApiRepository
    ) {
    }


    public function __invoke(GetStarWarsCharactersQuery $getStarWarsCharactersQuery): array
    {
        $assembledCharacters = [];
        for ($i = 0; $i < $getStarWarsCharactersQuery->numberOfCharactersTofetch; $i++) {
            $assembledCharacters[] = $this->assembleCharacter(
                character: json_decode($this->characterApiRepository->fetchCharacterWithId($i), true)
            );
        }


        return $assembledCharacters;
    }

    private function assembleCharacter(array $character): Character
    {
        $assembledMovies = [];
        foreach ($character['films'] as $moviePath) {
            $assembledMovies[] = $this->assembleMovies(moviePath: $moviePath);
        }
        $assembledCharacter = new Character();
        $assembledCharacter->setId($this->getIdFromPath($character['url']))
            ->setName($character['name'])
            ->setGender($character['gender'])
            ->setMass((int)$character['mass'])
            ->setHeight((int)$character['height'])
            ->setPicture('')
            ->setMovies($assembledMovies);
        return $assembledCharacter;
    }

    private function assembleMovies(string $moviePath): Movie
    {
        $movie = json_decode($this->movieApiRepository->fetchMovieByPath(path: $moviePath), true);
        $assembledMovie = new Movie();
        $assembledMovie->setId($this->getIdFromPath($moviePath))
            ->setName($movie['title']);
        return $assembledMovie;
    }

    private function getIdFromPath(string $path): int
    {
        $path = substr($path, 0, -1);
        $id = substr($path, -1);
        return (int) $id;
    }
}
