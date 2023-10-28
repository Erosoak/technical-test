<?php declare(strict_types=1);

namespace App\Characters\Application\Command;

use App\Characters\Domain\Character;
use App\Characters\Domain\CharacterDoctrineRepository;
use App\Shared\Application\CommandHandlerInterface;

class StoreStarWarsCharactersCommandHandler implements CommandHandlerInterface
{
    public function __construct(private readonly CharacterDoctrineRepository $characterDoctrineRepository)
    {
    }

    public function __invoke(StoreStarWarsCharactersCommand $storeStarWarsCharactersCommand): void
    {
        $character = new Character();
        $character->setId($storeStarWarsCharactersCommand->id)
            ->setName($storeStarWarsCharactersCommand->name)
            ->setMass($storeStarWarsCharactersCommand->mass)
            ->setHeight($storeStarWarsCharactersCommand->height)
            ->setGender($storeStarWarsCharactersCommand->gender);
        $this->characterDoctrineRepository->store($character);
    }
}
