<?php
// C'est un moyen de stocker des données côté serveur pour les garder entre plusieurs pages. 
// Par exemple le pseudo du joueur connecté, son score, le thème choisi...
session_start();

// On vérifie que la méthode utilisé est bien celle qu'on voulait
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../public/index.php?error=bad-method");
    exit();
}

// On vérifie qu'on a bien reçu tous les inputs
if (!isset($_POST["pseudo"]) || !isset($_POST["mot_de_passe"])) {
    header("Location: ../public/index.php?error=missing-value");
    exit();
}

// On vérifie qu'un des champs n'est pas vide
if (empty($_POST["pseudo"]) || empty($_POST["mot_de_passe"])) {
    header("Location: ../public/index.php?error=value-empty");
    exit();
}

$pseudo = htmlspecialchars(trim($_POST["pseudo"]));
$mot_de_passe = trim($_POST["mot_de_passe"]);

// On vérifie que les règles d'usages sont respectées
if (strlen($pseudo) > 50) {
    header("Location: ../public/index.php");
    exit();
}
// On vérifie la longueur
if (strlen($mot_de_passe) < 6 || strlen($mot_de_passe) > 50) {
    header("Location: ../public/index.php");
    exit();
}


// inclusion d'un fichier PHP une seule fois dans l'execution du script
require_once "../utils/db_connexion.php";
require_once "../utils/autoloader.php";

$joueurRepository = new JoueurRepository($db);
$joueur = $joueurRepository->findByPseudo($pseudo);

// L'INSERT → crée le joueur s'il n'existe pas
if (!$joueur) {
    // Hachage du mot de passe → on ne stocke JAMAIS le mot de passe en clair
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_BCRYPT);

    $joueurRepository->create($pseudo, $mot_de_passe_hash);


    // Deuxième SELECT → récupère le joueur après l'insertion pour avoir son id et toutes ses données:Le SELECT * ramène toutes les colonnes de la table |id + pseudo|
    $joueur = $joueurRepository->findByPseudo($pseudo);
    // Alors $joueur contiendra un tableau comme ça :
    // $joueur = [
    //     'id'     => 1,
    //     'pseudo' => 'Henria'
    // ]
}

// Lors d'une future page de connexion
if (!password_verify($mot_de_passe, $joueur->getMot_de_passe())) {
    header("Location: ../public/index.php?error=bad-credentials");
    exit();
}

$_SESSION["joueur"] = $joueur;
$_SESSION['theme'] = null; 
// stocke tout le tableau, tout le joueur en session (id+pseudo)
// remet le thème à NULL à chaque connexion
// ou
// ou plus précis :
// $_SESSION['id']     = $joueur['id'];
// $_SESSION['pseudo'] = $joueur['pseudo'];


header("Location: ../public/index.php");
exit;
