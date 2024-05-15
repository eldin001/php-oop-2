<?php
include_once __DIR__ . "/AnimalCategory.php";
include_once __DIR__ . "/AccessoryCategory.php";
include_once __DIR__ . "/../traits/DrawCard.php";

class Prodotto
{
    use DrawCard;
    protected $id;
    protected $img;
    protected $name;
    protected $prezzo;
    public AnimalCategory $animale;
    protected $valutazione;
    public $descrizione;

    public function __construct($id, string $img, string $name, string $prezzo, $animale, $valutazione, $descrizione)
    {
        $this->id = $id;
        $this->img = $img;
        $this->name = $name;
        $this->prezzo = $prezzo;
        $this->animale = $animale;
        $this->valutazione = $valutazione;
        $this->descrizione = $descrizione;
    }

    /**
     * scopo: ritornare una lista di elementi (come array di oggetti PRODOTTO) che contengono tutte le loro caratteristiche, di cui una (animale) deve essere un oggetto categoria.
     */
    public static function fetchAll(string $path, string $type)
    {
        include_once __DIR__ . "/Accessorio.php";
        include_once __DIR__ . "/Gioco.php";
        include_once __DIR__ . "/Cibo.php";
        //recupero i dati dal db, li converto in un array associativo e li salvo in una variabile
        $data = file_get_contents(__DIR__ . '/../resurces/' . $path . '.json');
        $dataToArray = json_decode($data, true);
        //recupero tutte le categorie e le salvo dentro un array come oggetti
        $arrayAllCategories = AnimalCategory::getAllCategories();
        //istanzio la lista di elementi (oggetti Prodotto) da ritornare (inizialmente come vuota)
        $elements = [];
        //per ogni elemento del db immagazzinato in dataToArray vado creare un new Prodotto(), prima di farlo però gli devo passare una categoria che è un oggetto.
        foreach ($dataToArray as $item) {
            $category = null;
            foreach ($arrayAllCategories as $categoriaSingola) {
                if ($categoriaSingola->name == $item["animale"]) {
                    $category = $categoriaSingola;
                }
            };
            //var_dump($type);
            switch ($type) {
                case "Gioco":
                    $elements[] = new $type(
                        $item['id'],
                        $item['img'],
                        $item['name'],
                        $item['prezzo'],
                        $category,
                        $item['valutazione'],
                        $item['descrizione'],
                        $item['tipologia'],
                    );
                    break;
                case "Cibo":
                    $elements[] = new $type(
                        $item['id'],
                        $item['img'],
                        $item['name'],
                        $item['prezzo'],
                        $category,
                        $item['valutazione'],
                        $item['descrizione'],
                        $item['tipologia'],
                        $item['peso']
                    );
                    break;
                case "Accessorio":
                    $arrayAllCategoriesOfAccessory = AccessoryCategory::getAllCategories();
                    $categoryOfAccessory = null;
                    foreach ($arrayAllCategoriesOfAccessory as $categoriaSingola) {
                        if ($categoriaSingola->name == $item["tipoDiAccessorio"]) {
                            $categoryOfAccessory = $categoriaSingola;
                        }
                    };
                    $elements[] = new $type(
                        $item['id'],
                        $item['img'],
                        $item['name'],
                        $item['prezzo'],
                        $category,
                        $item['valutazione'],
                        $item['descrizione'],
                        $categoryOfAccessory
                    );
                    break;
            }
        }
        //var_dump($elements);
        return $elements;
    }
}
