<?php declare(strict_types=1);

namespace App\Characters\Domain;

interface CharacterDoctrineRepository
{
    public function store(Character $character): void;
}
