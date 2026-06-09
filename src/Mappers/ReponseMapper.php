<?php 

final class ReponseMapper
{
    public static function mapToObject(array $reponseData, Question $question): Reponse
    {
        return new Reponse(
            $reponseData['id'],
            $reponseData['intitule'],
            $reponseData['correct_ou_non'],
            $question  
            // $reponseData['question_id'],
        );
    }
}

?>