<?php

namespace App\Einkauf\Shop\Model;

class SortCatModel
{
    private int $id;
    private string $name;
    private int $position;

    public function __construct(int $id, string $name, int $position)
    {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

}