<?php
// JoueurMapper sert à convertir un tableau 
// (ce que retourne PDO) en objet Joueur.
// PDO retourne toujours des tableaux :

final class QuestionMapper
{
    public static function mapToObject(array $questionData): Question
    {
        return new Question(
            $questionData['id'],
            $questionData['intitule'],
            $questionData['tp_limite']
        );
    }
}
 ?>