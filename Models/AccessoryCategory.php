<?php

class AccessoryCategory
{
    public string $name;
    //private string $color;
    function __construct(string $name)
    {
        $this->name = $name;
        //$this->color = $this->getColor($name);
    }
    public static function getAllCategories()
    {
        $allCategories = json_decode(file_get_contents(__DIR__ . "/../resurces/Category_db.json"), true);
        $categories = [];
        foreach ($allCategories[1]['tipoDiAccessorio'] as $category) {

            $categories[] = new AccessoryCategory($category);
        };
        return $categories;
    }

    // public function getColor($name)
    // {
    //     switch ($name) {
    //         case "cane":
    //             return "Marrone";
    //         case "gatto":
    //             return "Grigio";
    //         case "pesce":
    //             return "Blu";
    //         case "cavallo":
    //             return "Marrone scuro";
    //         case "uccello":
    //             return "Giallo";
    //         default:
    //             return "Colore non specificato";
    //     }
    // }
}
