<?php


require_once "../utils/autoloader.php";
session_start();

// var_dump('avant isConnected', isset($_SESSION['joueur']));
// require_once "../utils/isConnected.php";

// var_dump('avant isThemeChosen', isset($_SESSION['qcm']));
// require_once "../utils/isThemeChosen.php";

// var_dump('tout est ok');
// die();
require_once "../utils/isConnected.php";
require_once "../utils/db_connexion.php";
require_once "../utils/isThemeChosen.php";
// chercher les questions en bdd
// imbriquer les reponses qui vont avec

$questionRepo = new QuestionRepository($db);
$reponseRepo = new ReponseRepository($db);

$questions = $questionRepo->findByQcm($_SESSION['qcm']);

// >ICI il faut pour chaque questions, récupérer les réponses qui vont avec et les imbriqués

foreach ($questions as $question) {
    $question->setReponses(
        // $reponseRepo->findByQuestionId($question->getId(), $question)
        $reponseRepo->findByQuestionId($question)
    );


//  Mélanger les réponses de chaque question
    $reponses = $question->getReponses();
    shuffle($reponses);
    $question->setReponses($reponses);


}
// /  Mélanger l'ordre des questions
shuffle($questions);
$_SESSION['questions'] = $questions;

// indicateur à par qui permet de savoir à quelle question on est
$_SESSION['index_question'] = 0;

// var_dump($_SESSION);
// die();

// Tout est ok → on redirige vers questions.php
header("Location: ../public/questions.php");
exit();
?>