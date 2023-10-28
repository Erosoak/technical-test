<?php declare(strict_types=1);

namespace App\Characters\Domain;

interface CharacterApiRepository
{
    public function fetchCharacterWithId(int $id): ?string;
    public function fetchCharactersByQuantity(int $quantity): ?string;
}
