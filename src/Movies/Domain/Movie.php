<?php declare(strict_types=1);

namespace App\Movies\Domain;
class Movie
{
    private int $id;
    private string $name;
    private array $characters;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Movie
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Movie
    {
        $this->name = $name;
        return $this;
    }
}
