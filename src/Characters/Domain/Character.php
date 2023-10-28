<?php declare(strict_types=1);

namespace App\Characters\Domain;
class Character
{
    private int $id;
    private string $name;
    private int $mass;
    private int $height;
    private string $gender;
    private string $picture;
    private array $movies;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Character
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    public function getMass(): int
    {
        return $this->mass;
    }

    public function setMass(int $mass): Character
    {
        $this->mass = $mass;
        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): Character
    {
        $this->height = $height;
        return $this;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): Character
    {
        $this->gender = $gender;
        return $this;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): Character
    {
        $this->picture = $picture;
        return $this;
    }

    public function getMovies(): array
    {
        return $this->movies;
    }

    public function setMovies(array $movies): Character
    {
        $this->movies = $movies;
        return $this;
    }
}
