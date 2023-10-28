<?php declare(strict_types=1);

namespace App\Characters\Application\Command;

use App\Characters\Domain\CharacterDoctrineRepository;
use App\Shared\Application\CommandHandlerInterface;

class StoreStarWarsCharactersCommandHandler implements CommandHandlerInterface
{
    public function __construct(private readonly CharacterDoctrineRepository $characterDoctrineRepository)
    {
    }

    public function __invoke(StoreStarWarsCharactersCommand $storeStarWarsCharactersCommand): void
    {
        // TODO: Implement __invoke() method.
    }
}
