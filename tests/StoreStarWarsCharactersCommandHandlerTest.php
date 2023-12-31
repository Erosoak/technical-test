<?php declare(strict_types=1);

use App\Characters\Application\Command\StoreStarWarsCharactersCommand;
use App\Characters\Domain\CharacterDoctrineRepository;
use App\Characters\Application\Command\StoreStarWarsCharactersCommandHandler;
use App\Shared\Application\CommandHandlerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class StoreStarWarsCharactersCommandHandlerTest extends TestCase
{
    private StoreStarWarsCharactersCommandHandler $sut;
    private CharacterDoctrineRepository|MockObject $characterDoctrineRepository;
    protected function setUp(): void
    {
        $this->characterDoctrineRepository = $this->createMock(CharacterDoctrineRepository::class);
        $this->sut = new StoreStarWarsCharactersCommandHandler($this->characterDoctrineRepository);
    }

    /**
     * @test
     */
    public function itShouldBeOfProperClass(): void
    {
        $this->assertInstanceOf(CommandHandlerInterface::class, $this->sut);
        $this->assertInstanceOf(StoreStarWarsCharactersCommandHandler::class, $this->sut);
    }

    /**
     * @test
     */
    public function itShouldStoreCharactersInDatabase(): void
    {
        $this->characterDoctrineRepository->expects($this->once())->method('store');
        $command = new StoreStarWarsCharactersCommand(
            id: 1,
            name: 'Luke Skywalker',
            mass: 77,
            height: 172,
            gender: 'male',
            picture: 'https://awesomepictureofluke.com'
        );
        ($this->sut)($command);
    }
}

