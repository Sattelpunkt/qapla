<?php

namespace App\Einkauf\Article\Model;

class ArticleModel
{
    private int $id;
    private string $anzahl;
    private string $name;
    private string $bundle;
    private string $shop;
    private string $cat;

    public function __construct(int $id, string $anzahl, string $name, string $bundle, string $shop, string $cat)
    {
        $this->id = $id;
        $this->anzahl = $anzahl;
        $this->name = $name;
        $this->bundle = $bundle;
        $this->shop = $shop;
        $this->cat = $cat;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function getAnzahl(): string
    {
        return $this->anzahl;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getBundle(): string
    {
        return $this->bundle;
    }


    public function getShop(): string
    {
        return $this->shop;
    }


    public function getCat(): string
    {
        return $this->cat;
    }


}