
<?php
include_once __DIR__ . "/Prodotto.php";
include_once __DIR__ . "/../traits/DrawCard.php";


class Gioco extends Prodotto
{
    public string $tipologiaDiGioco;

    public function __construct($id, string $img, string $name, string $prezzo, $animale, $valutazione, $descrizione, $tipologiaDiGioco)
    {

        $this->tipologiaDiGioco = $tipologiaDiGioco;

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
            'tipo' => "Tipo di Gioco: " . $this->tipologiaDiGioco
        ];
        return $arrayAssociativoPerTemplate;
    }
}
