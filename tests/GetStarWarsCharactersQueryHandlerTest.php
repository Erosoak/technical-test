<?php declare(strict_types=1);

use App\Characters\Application\Query\GetStarWarsCharactersQuery;
use App\Characters\Application\Query\GetStarWarsCharactersQueryHandler;
use App\Characters\Domain\CharacterApiRepository;
use App\Movies\Domain\MovieApiRepository;
use App\Shared\Application\QueryHandlerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GetStarWarsCharactersQueryHandlerTest extends TestCase
{
    private GetStarWarsCharactersQueryHandler $sut;
    private MovieApiRepository|MockObject $movieApiRepository;
    private CharacterApiRepository|MockObject $characterApiRepository;
    protected function setUp(): void
    {
        $this->characterApiRepository = $this->createMock(CharacterApiRepository::class);
        $this->movieApiRepository = $this->createMock(MovieApiRepository::class);
        $this->sut = new GetStarWarsCharactersQueryHandler($this->characterApiRepository, $this->movieApiRepository);
    }

    /**
     * @test
     */
    public function itShouldBeOfProperClass(): void
    {
        $this->assertInstanceOf(expected: QueryHandlerInterface::class, actual: $this->sut);
        $this->assertInstanceOf(expected: GetStarWarsCharactersQueryHandler::class, actual: $this->sut);
    }

    /**
     * @test
     */

    public function itShouldReturnAnArrayOfCharacters(): void
    {
        $this->characterApiRepository->expects($this->exactly(30))
            ->method('fetchCharacterWithId')
            ->willReturn($this->apiCharacterReturn());
        $this->movieApiRepository->expects($this->atLeastOnce())
            ->method('fetchMovieByPath')
            ->willReturn($this->apiMovieReturn());
        $query = new GetStarWarsCharactersQuery(numberOfCharactersTofetch: 30);
        $result = ($this->sut)($query);
        $this->assertIsArray($result);
    }

    private function apiCharacterReturn(): string
    {
        return '{
            "name": "Luke Skywalker",
            "height": "172",
            "mass": "77",
            "hair_color": "blond",
            "skin_color": "fair",
            "eye_color": "blue",
            "birth_year": "19BBY",
            "gender": "male",
            "homeworld": "https://swapi.dev/api/planets/1/",
            "films": [
                "https://swapi.dev/api/films/1/",
                "https://swapi.dev/api/films/2/",
                "https://swapi.dev/api/films/3/",
                "https://swapi.dev/api/films/6/"
            ],
            "species": [],
            "vehicles": [
                "https://swapi.dev/api/vehicles/14/",
                "https://swapi.dev/api/vehicles/30/"
            ],
            "starships": [
                "https://swapi.dev/api/starships/12/",
                "https://swapi.dev/api/starships/22/"
            ],
            "created": "2014-12-09T13:50:51.644000Z",
            "edited": "2014-12-20T21:17:56.891000Z",
            "url": "https://swapi.dev/api/people/1/"
        }';
    }

    private function apiMovieReturn(): string
    {
        return '{
            "title": "A New Hope",
            "episode_id": 4,
            "opening_crawl": "It is a period of civil war.\r\nRebel spaceships, striking\r\nfrom a hidden base, have won\r\ntheir first victory against\r\nthe evil Galactic Empire.\r\n\r\nDuring the battle, Rebel\r\nspies managed to steal secret\r\nplans to the Empires\r\nultimate weapon, the DEATH\r\nSTAR, an armored space\r\nstation with enough power\r\nto destroy an entire planet.\r\n\r\nPursued by the Empires\r\nsinister agents, Princess\r\nLeia races home aboard her\r\nstarship, custodian of the\r\nstolen plans that can save her\r\npeople and restore\r\nfreedom to the galaxy....",
            "director": "George Lucas",
            "producer": "Gary Kurtz, Rick McCallum",
            "release_date": "1977-05-25",
            "characters": [
                "https://swapi.dev/api/people/1/",
                "https://swapi.dev/api/people/2/",
                "https://swapi.dev/api/people/3/",
                "https://swapi.dev/api/people/4/",
                "https://swapi.dev/api/people/5/",
                "https://swapi.dev/api/people/6/",
                "https://swapi.dev/api/people/7/",
                "https://swapi.dev/api/people/8/",
                "https://swapi.dev/api/people/9/",
                "https://swapi.dev/api/people/10/",
                "https://swapi.dev/api/people/12/",
                "https://swapi.dev/api/people/13/",
                "https://swapi.dev/api/people/14/",
                "https://swapi.dev/api/people/15/",
                "https://swapi.dev/api/people/16/",
                "https://swapi.dev/api/people/18/",
                "https://swapi.dev/api/people/19/",
                "https://swapi.dev/api/people/81/"
            ],
            "planets": [
                "https://swapi.dev/api/planets/1/",
                "https://swapi.dev/api/planets/2/",
                "https://swapi.dev/api/planets/3/"
            ],
            "starships": [
                "https://swapi.dev/api/starships/2/",
                "https://swapi.dev/api/starships/3/",
                "https://swapi.dev/api/starships/5/",
                "https://swapi.dev/api/starships/9/",
                "https://swapi.dev/api/starships/10/",
                "https://swapi.dev/api/starships/11/",
                "https://swapi.dev/api/starships/12/",
                "https://swapi.dev/api/starships/13/"
            ],
            "vehicles": [
                "https://swapi.dev/api/vehicles/4/",
                "https://swapi.dev/api/vehicles/6/",
                "https://swapi.dev/api/vehicles/7/",
                "https://swapi.dev/api/vehicles/8/"
            ],
            "species": [
                "https://swapi.dev/api/species/1/",
                "https://swapi.dev/api/species/2/",
                "https://swapi.dev/api/species/3/",
                "https://swapi.dev/api/species/4/",
                "https://swapi.dev/api/species/5/"
            ],
            "created": "2014-12-10T14:23:31.880000Z",
            "edited": "2014-12-20T19:49:45.256000Z",
            "url": "https://swapi.dev/api/films/1/"
        }';
    }
}

