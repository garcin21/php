<?php

// Interface IAnimal définissant les méthodes obligatoires pour toutes les classes qui l'implémentent.
// Ces méthodes incluent faireUnSon, manger, marcher, dormir, et courir.

interface IAnimal {
    public function faireUnSon();
    public function manger();
    public function marcher();
    public function dormir();
    public function courir();
}

// Classe abstraite Animal qui implémente l'interface IAnimal.
// Cette classe sert de base pour tous les types d'animaux et fournit des implémentations de base
// pour les méthodes de l'interface qui seront communes à tous les animaux.

abstract class Animal implements IAnimal {
    
    // Propriété protégée pour stocker le nom de l'animal.
    protected $nom;

    // Constructeur pour initialiser l'animal avec un nom.
    public function __construct($nom) {
        $this->nom = $nom;
    }

    // Méthode pour simuler la marche de l'animal.
    public function marcher() {
        return "{$this->nom} marche.";
    }

    // Méthode pour simuler le sommeil de l'animal.
    public function dormir() {
        return "{$this->nom} dort.";
    }

    // Méthode pour simuler la course de l'animal.
    
    public function courir() {
        return "{$this->nom} court.";
    }
}

// Classe Lion qui hérite de Animal et spécifie des comportements particuliers pour un lion.

class Lion extends Animal {
    
    // Implémentation spécifique pour le lion pour faire un son.
    
    public function faireUnSon() {
        return "{$this->nom} rugit.";
    }

    // Implémentation spécifique pour le lion pour manger.
    // Lance une exception si le lion nommé Simba n'a pas faim.
    
    public function manger() {
        if ($this->nom == "Simba") {
            throw new Exception("Simba n'a pas faim maintenant.");
        }
        return "{$this->nom} mange de la viande.";
    }
}

// Classe Girafe qui hérite de Animal et définit des comportements spécifiques pour une girafe.

class Girafe extends Animal {
    
    // Implémentation spécifique pour la girafe pour faire un son.
    
    public function faireUnSon() {
        return "{$this->nom} émet des sons doux.";
    }

    // Implémentation spécifique pour la girafe pour manger.
    
    public function manger() {
        return "{$this->nom} mange des feuilles.";
    }
}

// Classe Elephant qui hérite de Animal et définit des comportements spécifiques pour un éléphant.

class Elephant extends Animal {
    
    // Implémentation spécifique pour l'éléphant pour faire un son.
    
    public function faireUnSon() {
        return "{$this->nom} barrit.";
    }

    // Implémentation spécifique pour l'éléphant pour manger.
    
    public function manger() {
        return "{$this->nom} mange des branches.";
    }
}

// Fonction principale pour créer des instances de Lion, Girafe, et Éléphant,
// et afficher leur comportement.

function main() {
    $simba = new Lion("Simba");
    $zoe = new Girafe("Zoe");
    $elly = new Elephant("Elly");

    // Stockage des instances dans un tableau pour itération.
    
     $animaux = array($simba, $zoe, $elly);

    // Boucle pour appeler les méthodes faireUnSon, manger, marcher, dormir, et courir sur chaque animal.
    
    foreach ($animaux as $animal) {
        echo $animal->faireUnSon() . "\n";
        try {
            echo $animal->manger() . "\n";
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage() . "\n";  // Gestion des exceptions pour les erreurs lors du manger.
        }
        echo $animal->marcher() . "\n";
        echo $animal->dormir() . "\n";
        echo $animal->courir() . "\n";
    }
}

// Exécution de la fonction main pour démarrer le programme.

main();
?>
