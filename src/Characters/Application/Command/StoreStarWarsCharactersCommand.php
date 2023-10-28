<?php declare(strict_types=1);

namespace App\Characters\Application\Command;

class StoreStarWarsCharactersCommand
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $mass,
        public readonly int $height,
        public readonly string $gender,
        public readonly string $picture
    )
    {
    }
}
