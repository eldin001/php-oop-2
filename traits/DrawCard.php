 <?php
    //esse sono classi che si possono usare ovunque
    trait DrawCard
    {
        public function printCard($array)
        {
            // estre la variabile di $arry da dove viene usata DrowCard
            extract($array);
            include __DIR__ . "/../Views/body/Card.php";
        }

        public function getVote($valutazione)
        {
            $vote = ceil($valutazione);
            $template = "<p>";
            for ($i = 1; $i <= 5; $i++) {
                $template .= $i <= $vote ? "<i class='fa-solid fa-star'></i>" : "<i class='fa-regular fa-star'></i>";
            }
            $template .= "</p>";
            return $template;
        }
    }
