<?php 
// C'est un moyen de stocker des données côté serveur pour les garder entre plusieurs pages. 
// Par exemple le pseudo du joueur connecté, son score, le thème choisi...
session_start();

// On vérifie que la méthode utilisé est bien celle qu'on voulait
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../public/index.php");
    exit();
}

// On vérifie qu'on a bien reçu tous les inputs
if (!isset($_POST["pseudo"])) {
    header("Location: ../public/index.php");
    exit();
}

// On vérifie qu'un des champs n'est pas vide
if (empty($_POST["pseudo"])) {
    header("Location: ../public/index.php");
    exit();
}

$pseudo = htmlspecialchars(trim($_POST["pseudo"]));

// On vérifie que les règles d'usages sont respectées
if (strlen($pseudo) > 50) {
    header("Location: ../public/index.php");
    exit();
}

// inclusion d'un fichier PHP une seule fois dans l'execution du script
require_once "../utils/db_connexion.php";

// Premier SELECT → vérifie si le joueur existe déjà
$request = $db->prepare('SELECT * FROM joueur WHERE pseudo = :pseudo');
$request->execute([':pseudo' => $pseudo]);
$joueur = $request->fetch(PDO::FETCH_ASSOC);


// L'INSERT → crée le joueur s'il n'existe pas
if (!$joueur) {
    $request = $db->prepare('INSERT INTO joueur(pseudo) VALUES (:pseudo)');
    $request->execute([":pseudo" => $pseudo]);

    // Deuxième SELECT → récupère le joueur après l'insertion pour avoir son id et toutes ses données:Le SELECT * ramène toutes les colonnes de la table |id + pseudo|
    $request = $db->prepare('SELECT * FROM joueur WHERE pseudo = :pseudo');
    $request->execute([':pseudo' => $pseudo]);
    $joueur = $request->fetch(PDO::FETCH_ASSOC);
// Alors $joueur contiendra un tableau comme ça :
// $joueur = [
//     'id'     => 1,
//     'pseudo' => 'Henria'
// ]
}

$_SESSION["pseudo"] = $joueur;
 // stocke tout le tableau, tout le joueur en session (id+pseudo)
// ou
// ou plus précis :
// $_SESSION['id']     = $joueur['id'];
// $_SESSION['pseudo'] = $joueur['pseudo'];


header("Location: ../public/index.php");
exit;

?>
