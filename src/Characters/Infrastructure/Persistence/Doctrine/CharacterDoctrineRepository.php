<?php declare(strict_types=1);

use App\Characters\Domain\CharacterDoctrineRepository as CharacterDoctrineRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class CharacterDoctrineRepository extends EntityRepository implements CharacterDoctrineRepositoryInterface
{

}
