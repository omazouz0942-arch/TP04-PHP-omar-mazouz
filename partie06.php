<?php

class Personne {
    public function __construct(
        protected string $nom,
        protected string $prenom,
        protected string $dateNaissance
    ) {}

    protected function getAge(): int {
        $naissance = new DateTime($this->dateNaissance);
        $aujourdhui = new DateTime();
        return $naissance->diff($aujourdhui)->y;
    }

    public function __toString(): string {
        return $this->prenom . " " . $this->nom . " (" . $this->getAge() . " ans)";
    }
}

class Etudiant extends Personne {
    private string $cne;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $cne) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->cne = $cne;
    }

    public function getCne(): string {
        return $this->cne;
    }

    public function __toString(): string {
        return parent::__toString() . " - CNE: " . $this->cne;
    }
}

$etudiants = [
    new Etudiant("Hachimi", "Sara", "2002-05-14", "N130011223"),
    new Etudiant("Alami", "Amine", "2001-10-20", "G145099887"),
    new Etudiant("Bennani", "Youssef", "2003-01-15", "K99887766"),
    new Etudiant("Sabiri", "Khadija", "2002-08-04", "R12345678"),
    new Etudiant("Tahiri", "Omar", "2001-12-30", "D98765432")
];

foreach ($etudiants as $e) {
    echo $e . PHP_EOL;
}
?>