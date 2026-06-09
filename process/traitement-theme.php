<?php 
session_start();



require_once "../utils/isConnected.php";
require_once "../utils/db_connexion.php";
require_once "../utils/autoloader.php";



// On vérifie que la méthode utilisé est bien celle qu'on voulait
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../public/index.php?error=bad-method");
    exit();
}

// On vérifie qu'on a bien reçu tous les inputs
if (!isset($_POST["theme"])) {
    header("Location: ../public/index.php?error=missing-value");
    exit();
}

// On vérifie qu'un des champs n'est pas vide
if (empty($_POST["theme"])) {
    header("Location: ../public/index.php?error=value-empty");
    exit();
}

// On vérifie que le thème est bien valide (c'est la liste des valeurs acceptées)
$themesAutorises = ['programmation', 'cartographie'];
// Si le thème envoyé n'est PAS dans la liste des thèmes autorisés ou
// si le thème est "programmation" -> in _array = true -> !true = false-> on n'entre pas dans le if
// si le thème est piratgae-> in_array=false-> !false=true-> on entre dans le if et on redirige. 
if (!in_array($_POST["theme"], $themesAutorises)) {
    header("Location: ../public/index.php?error=bad-theme");
    exit();
}

$theme = htmlspecialchars(trim($_POST["theme"]));

$qcmRepo = new QcmRepository($db);


$qcm = $qcmRepo->findByTheme($theme);

// On stocke le thème en session
$_SESSION['qcm'] = $qcm;

header("Location: ../public/index.php");
exit();

?>