Réponse à la question 0.3 : $v1 et $v2 partagent-ils la même valeur de $marque ? Pourquoi ?Non, $v1 et $v2 ne partagent pas la même valeur.   Explication : Ce sont deux instances distinctes (deux objets séparés) de la classe Voiture. Chaque objet possède son propre espace mémoire et gère ses propres valeurs d'attributs de manière indépendante. La modification de $v2 n'affecte pas $v1.  
2.1.a Que se passe-t-il avec new Voiture("Noire") ? Et new Voiture(120) ?new Voiture("Noire") attribue "Noire" à la couleur et conserve 0 pour la vitesse.   new Voiture(120) passe 120 au premier paramètre ($couleur). En mode coercitif (par défaut en PHP), l'entier 120 est converti en chaîne "120". La vitesse reste à 0.2.1.b Quel est l'avantage de la promotion de propriétés ?
Elle réduit le code répétitif (boilerplate). Au lieu de déclarer les attributs, les passer au constructeur et faire $this->prop = $prop, tout se fait directement dans la signature de __construct().   2.2.a Que remarquez-vous en écrivant deux constructeurs ? Pourquoi ?
PHP déclenche une erreur fatale (Fatal error: Cannot redeclare Voiture::__construct()). En PHP, la surcharge de méthodes (overloading) avec le même nom n'est pas supportée.2.2.b Proposer une solution pour obtenir les deux comportements avec un seul constructeur.
Utiliser des valeurs par défaut pour rendre les arguments optionnels :
2.2
public function __construct(string $nom = "", string $prenom = "") {
    $this->nom = $nom;
    $this->prenom = $prenom;
}
Réponses aux questions sur le destructeur (pour reponses.md)2.3.a Dans quel ordre les trois messages s'affichent-ils avec unset ?Voiture Blanche créée.   Voiture Blanche détruite.   Fin du script.[cite: 1]2.3.b Que change-t-il si on supprime unset ?
L'ordre change : Fin du script. s'affiche avant Voiture Blanche détruite. car l'objet est détruit automatiquement à la toute fin de l'exécution du script.2.3.c Dans quel ordre $a et $b sont-ils détruits sans unset ?
Ils sont détruits dans l'ordre inverse de leur création (d'abord $b puis $a).