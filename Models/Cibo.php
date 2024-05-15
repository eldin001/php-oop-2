
<?php
include_once __DIR__ . "/Prodotto.php";
include_once __DIR__ . "/../traits/DrawCard.php";

class Cibo extends Prodotto
{
    public string $tipologiaDiCibo;
    public string $peso;

    public function __construct($id, string $img, string $name, string $prezzo, $animale, $valutazione, $descrizione, $tipologiaDiCibo, $peso)
    {

        $this->tipologiaDiCibo = $tipologiaDiCibo;
        $this->peso = $peso;

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
            'tipo' => "Tipo di cibo: " . $this->tipologiaDiCibo

        ];
        return $arrayAssociativoPerTemplate;
    }
}
