<?php

class Personne {
    private string $nom = "";
    private string $prenom = "";
    private string $dateNaissance = "";

    
    public function __set(string $name, mixed $value): void {
        // 3.4 Validation basita: ila kan l-nom khawi wla fiha aql mn 2 d l-hrouf
        if ($name == "nom" && strlen($value) < 2) {
            echo "Erreur : Le nom doit contenir au moins 2 caractères !" . PHP_EOL;
            return;
        }

        $this->$name = $value;
    }
    public function __get(string $name): mixed {
        return $this->$name;
    }
    public function __isset(string $name): bool {
        return !empty($this->$name);
    }
    public function __unset(string $name): void {
        $this->$name = ""; 
    }
}


$p = new Personne();

$p->nom = "Hachimi";              
echo "Nom : " . $p->nom . PHP_EOL;  

var_dump(isset($p->nom));        
unset($p->nom);                  
var_dump(isset($p->nom));        


$p->nom = "A";                