<?php declare(strict_types=1);

use App\Characters\Domain\Character;
use App\Characters\Domain\CharacterDoctrineRepository as CharacterDoctrineRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class CharacterDoctrineRepository extends EntityRepository implements CharacterDoctrineRepositoryInterface
{

    public function store(Character $character): void
    {
        // TODO: Implement store() method.
    }
}
