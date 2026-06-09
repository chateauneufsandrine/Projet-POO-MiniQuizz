<?php
require_once "../utils/autoloader.php";
session_start();

require_once "../utils/isConnected.php";

// Vérifier qu'une réponse a bien été choisie
if (!isset($_POST['reponse_id'])) {
    header("Location: ../public/questions.php");
    exit();
}

// 1. Récupérer l'id de la réponse choisie
$reponseChoisieId = $_POST['reponse_id'];

// 2. Récupérer la question actuelle
$questions = $_SESSION['questions'];
$index = $_SESSION['index_question'];
$questionActuelle = $questions[$index];

// 3. Trouver la réponse choisie parmi les réponses de la question
$reponseChoisie = null;
foreach ($questionActuelle->getReponses() as $reponse) {
    if ($reponse->getId() == $reponseChoisieId) {
        $reponseChoisie = $reponse;
        break;
    }
}

// 5. Trouver la bonne réponse
$bonneReponseId = null;

foreach ($questionActuelle->getReponses() as $reponse) {
    if ($reponse->getCorrect_ou_non()) {
        $bonneReponseId = $reponse->getId();
        break;
    }
}

$_SESSION['derniere_reponse'] = [
    'reponse_choisie_id' => $reponseChoisie->getId(),
    'est_correcte' => $reponseChoisie->getCorrect_ou_non(),
    'bonne_reponse_id' => $bonneReponseId
];

// 5. Rediriger vers questions.php pour afficher le résultat
header("Location: ../public/questions.php");
exit();