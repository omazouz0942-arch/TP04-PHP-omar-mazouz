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
partie5
5-1
le mot de passe n'y figure pas car nous l'avons volontairement exclu du tableau retourné par la méthode __serialize().
5-2
Par défaut, PHP va sérialiser toutes les propriétés de l'objet, y compris le mot de passe en clair (motDePasse).

Risque : Si la chaîne sérialisée est stockée dans un fichier, une base de données ou un cookie, le mot de passe confidentiel devient visible et accessible.
5-3
La valeur devient une chaîne vide ""
5-4
5.4 Réflexion sécurité : Pourquoi ne faut-il JAMAIS utiliser unserialize() sur des données venant de l'utilisateur ?

Danger (PHP Object Injection) : Si un utilisateur malveillant modifie la chaîne sérialisée reçue (via un cookie ou un formulaire), il peut injecter des objets arbitraires. Lors du unserialize(), PHP peut exécuter du code malveillant via les destructeurs ou autres méthodes magiques de votre application.

Alternative : Pour échanger des données en toute sécurité avec l'extérieur (APIs, formulaires), il faut utiliser JSON avec json_encode() et json_decode().
parie6
6-1
Non, il est impossible d'appeler $c->miauler() sur un objet de la classe Chien. Les classes Chien et Chat sont deux classes filles distinctes qui héritent d'Animal, mais elles n'ont aucun lien de parenté entre elles
6-2
L'attribut $nom (défini dans la classe mère Personne) ne sera pas initialisé lors de l'instanciation d'un Etudiant. Cela entraîne un avertissement ou une erreur d'exécution lorsque l'on tente d'accéder à $nom, car le constructeur parent n'a pas pu exécuter sa logique d'initialisation.
6-2
L'attribut est déclaré en protected afin qu'il soit accessible directement depuis la classe fille Etudiant. S'il avait été déclaré en private, seule la classe Personne y aurait accès et la classe Etudiant n'aurait pas pu en hériter direct.
6-3
6.3.a Observation des trois erreurs (final et readonly) :

Redéfinir afficher() dans Fille extends Base : Génère l'erreur Fatal error: Cannot override final method Base::afficher().

Créer class SousOutil extends Outil : Génère l'erreur Fatal error: Class SousOutil may not inherit from final class Outil.

Tenter de modifier $p->reference = "REF-002" : Génère l'erreur Fatal error: Cannot modify readonly property Produit::$reference
6-3
readonly : Utile pour des données immuables qui ne doivent jamais changer après l'initialisation, comme un identifiant unique (UUID), un numéro CIN ou une date de création.   final : Utile pour verrouiller une classe ou une méthode critique (par exemple un service de cryptage de mot de passe ou une logique de sécurité) pour empêcher qu'elle ne soit altérée ou surchargée par une classe fille
6-4a
PHP déclenche une erreur fatale : Fatal error: Cannot access private method Personne::getAge(). Pour que la classe fille puisse l'utiliser, il faut changer sa visibilité en protected (ou public)
6-4b
C'est impossible car $dateNaissance est déclarée en private dans Personne. La visibilité private restreint strictement l'accès au sein de la classe où elle a été déclarée. Même si Etudiant hérite de Personne, elle ne peut pas accéder aux membres privés de sa classe mère.   
6-4c
Si le format d'affichage d'une Personne change ultérieurement, la classe Etudiant s'adaptera automatiquement sans qu'il soit nécessaire d'y modifier le code.