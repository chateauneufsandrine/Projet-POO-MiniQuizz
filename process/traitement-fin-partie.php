<?php

require_once "../utils/autoloader.php";
session_start();

require_once "../utils/isConnected.php";
require_once "../utils/db_connexion.php";
require_once "../utils/isThemeChosen.php";

// Récupérer les données de la session
$joueur = $_SESSION['joueur'];
$qcm = $_SESSION['qcm'];
$score = $_SESSION['score'] ?? 0;
$chronoTotal = $_SESSION['chrono'] ?? 0;

// Insérer en BDD
$scoreRepo = new ScoreRepository($db);
$scoreRepo->insert($score, $qcm, $joueur, $chronoTotal);

// Nettoyer la session du quiz mais garder le joueur connecté
unset($_SESSION['questions']);
unset($_SESSION['index_question']);
unset($_SESSION['derniere_reponse']);
unset($_SESSION['score']);


// Rediriger vers la page résultats
header("Location: ../public/classement.php");
exit();
 ?>