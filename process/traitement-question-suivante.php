<?php

session_start();

if (!isset($_SESSION['index_question'])) {
    header('Location: ../public/questions.php');
    exit();
}

// Question suivante
$_SESSION['index_question']++;

// On efface la correction de la question précédente
unset($_SESSION['derniere_reponse']);

// Fin du quiz ?
if ($_SESSION['index_question'] >= count($_SESSION['questions'])) {
    header('Location: ../public/resultat.php');
    exit();
}

header('Location: ../public/questions.php');
exit();