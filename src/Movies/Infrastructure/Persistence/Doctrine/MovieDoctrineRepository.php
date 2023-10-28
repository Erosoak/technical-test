<?php declare(strict_types=1);

use App\Movies\Domain\MovieDoctrineRepository as MovieDoctrineRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class MovieDoctrineRepository extends EntityRepository implements MovieDoctrineRepositoryInterface
{

}
