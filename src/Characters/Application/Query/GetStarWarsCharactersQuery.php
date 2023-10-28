<?php declare(strict_types=1);

namespace App\Characters\Application\Query;

class GetStarWarsCharactersQuery
{
    public function __construct(public readonly int $numberOfCharactersTofetch)
    {
    }
}
