<?php

class Voiture {

    public function __construct(
        public string $couleur = "Blanche",
        public int $vitesse = 0
    ) {}

    public function afficher(): void {
        echo "Couleur : {$this->couleur} | Vitesse : {$this->vitesse} km/h" . PHP_EOL;
    }
}

$v1 = new Voiture();               
$v2 = new Voiture("Rouge", 50);    
$v1->afficher();
$v2->afficher();
$v3 = new Voiture("Noire");  
$v3->afficher();
$v4 = new Voiture(120);            
$v4->afficher();   
<?php

class Voiture {
    public function __construct(public string $couleur) {
        echo "Voiture {$this->couleur} créée." . PHP_EOL;
    }

    public function __destruct() {
        echo "Voiture {$this->couleur} détruite." . PHP_EOL;
    }
}

$maVoiture = new Voiture("Blanche");
unset($maVoiture);
echo "Fin du script." . PHP_EOL;
$a = new Voiture("Rouge");
$b = new Voiture("Bleue");
               