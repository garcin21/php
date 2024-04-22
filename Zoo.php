<?php
interface Interactable {
    public function interagir();
}

abstract class Animal implements Interactable {
    protected $nom;
    protected $niveauEnergie;

    public function __construct($nom) {
        $this->nom = $nom;
        $this->niveauEnergie = 10; // Chaque animal commence avec un niveau d'énergie de 10
    }

    abstract public function parler();
    abstract public function manger();

    public function interagir() {
        $this->niveauEnergie--; // Décrémenter l'énergie lors d'une interaction
        return $this->nom . " interagit avec les visiteurs.";
    }

    public function dormir() {
        $this->niveauEnergie += 3; // Incrémenter l'énergie lors du sommeil
        return $this->nom . " dort et regagne de l'énergie.";
    }
}

class Lion extends Animal {
    public function parler() {
        return $this->nom . " rugit.";
    }

    public function manger() {
        $this->niveauEnergie += 2; // Manger augmente l'énergie
        return $this->nom . " mange de la viande.";
    }
}

class Girafe extends Animal {
    public function parler() {
        return $this->nom . " émet des sons doux.";
    }

    public function manger() {
        $this->niveauEnergie += 2;
        return $this->nom . " mange des feuilles d'arbres.";
    }
}

class Elephant extends Animal {
    public function parler() {
        return $this->nom . " barrit.";
    }

    public function manger() {
        $this->niveauEnergie += 2;
        return $this->nom . " mange des branches et des feuilles.";
    }
}

function main() {
    $simba = new Lion("Simba");
    $zoe = new Girafe("Zoe");
    $elly = new Elephant("Elly");

    $animaux = array($simba, $zoe, $elly);

    foreach ($animaux as $animal) {
        echo $animal->parler() . "\n";
        echo $animal->manger() . "\n";
        echo $animal->interagir() . "\n";
        if ($animal->niveauEnergie < 5) {
            echo $animal->dormir() . "\n";
        }
    }
}

main();




