<?php
require_once "../utils/autoloader.php";
session_start();

require_once "../utils/isConnected.php";



// Vérifier qu'une réponse a bien été choisie
if (!isset($_POST['reponse_id'])) {
    header("Location: ../public/questions.php");
    exit();
}


// 1. Récupérer la question actuelle
$questions = $_SESSION['questions'];
$index = $_SESSION['index_question'];
$questionActuelle = $questions[$index];

// 2. Récupérer l'id de la réponse choisie
$reponseChoisieId = $_POST['reponse_id'];

// Cas timeout → 0 pts
if ($reponseChoisieId === 'timeout') {
    $bonneReponseId = null;
    foreach ($questionActuelle->getReponses() as $reponse) {
        if ($reponse->getCorrect_ou_non()) {
            $bonneReponseId = $reponse->getId();
            break;
        }
    }
    $_SESSION['derniere_reponse'] = [
        'reponse_choisie_id' => null,
        'est_correcte' => false,
        'bonne_reponse_id' => $bonneReponseId,
        'timeout' => true
    ];
    header("Location: ../public/questions.php");
    exit();
}

// 3. Trouver la réponse choisie et trouver la bonne réponse
$reponseChoisie = null;
$bonneReponseId = null;
foreach ($questionActuelle->getReponses() as $reponse) {
    if ($reponse->getId() == $reponseChoisieId) {
        $reponseChoisie = $reponse;
    }
    if ($reponse->getCorrect_ou_non()) {
        $bonneReponseId = $reponse->getId();
    }
}

// 5. Calculer le score
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
$temps = intval($_POST['temps_question']);

if ($reponseChoisie->getCorrect_ou_non()) { 
    var_dump($reponse); // Doit afficher ton objet, pas NULL
// ligne 63 : $reponse->getCorrect_ou_non();
    if ($temps <= 5) {
        $points = 20;
    } elseif ($temps <= 10) {
        $points = 15;
    } elseif ($temps <= 20) {
        $points = 10;
    } else {
        $points = 5;
    }
    $_SESSION['score'] += $points;
}

// Calculer le temps total qu'à passé la personne sur le quiz
if (!isset($_SESSION['chrono'])) {
    $_SESSION['chrono'] = 0;
}
$_SESSION['chrono'] += $temps;



// 6. Sauvegarder la dernière réponse pour la correction
$_SESSION['derniere_reponse'] = [
    'reponse_choisie_id' => $reponseChoisie->getId(),
    'est_correcte' => $reponseChoisie->getCorrect_ou_non(),
    'bonne_reponse_id' => $bonneReponseId,
    'timeout' => false
];

header("Location: ../public/questions.php");
exit();
