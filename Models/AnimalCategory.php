<?php

class AnimalCategory
{
    public string $name;
    public string $color;
    function __construct(string $name)
    {
        $this->name = $name;
        $this->color = $this->getColor($name);
    }
    public static function getAllCategories()
    {
        $allCategories = json_decode(file_get_contents(__DIR__ . "/../resurces/Category_db.json"), true);

        $categories = [];
        foreach ($allCategories[0]['animale'] as $category) {

            $categories[] = new AnimalCategory($category);
        };
        return $categories;
    }

    public function getColor($name)
    {
        switch ($name) {
            case "cane":
                return "red";
            case "gatto":
                return "green";
            case "pesce":
                return "blue";
            case "cavallo":
                return "brown";
            case "uccello":
                return "yellow";
            default:
                return "white";
        }
    }
}
