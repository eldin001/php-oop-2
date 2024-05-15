

    <?php
    include_once __DIR__ . "/Prodotto.php";

    class Accessorio extends Prodotto
    {
        public AccessoryCategory $tipoDiAccessorio;

        public function __construct($id, string $img, string $name, string $prezzo, $animale, $valutazione, $descrizione, $tipoDiAccessorio)
        {

            $this->tipoDiAccessorio = $tipoDiAccessorio;

            parent::__construct($id, $img, $name, $prezzo, $animale, $valutazione, $descrizione);
        }

        public function formatItem()
        {
            $arrayAssociativoPerTemplate = [
                'id' => $this->id,
                'img' => $this->img,
                'name' => $this->name,
                'prezzo' => $this->prezzo,
                'valutazione' => $this->getVote($this->valutazione),
                'descrizione' => $this->descrizione,
                'colore' => $this->animale->color,
                'tipo' => "Tipo di Accessorio: " . $this->tipoDiAccessorio->name

            ];
            return $arrayAssociativoPerTemplate;
        }
    }
