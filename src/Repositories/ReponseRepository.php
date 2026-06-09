<?php 

final class ReponseRepository
{
    public function __construct(
        private PDO $db
    ){}

public function findByQuestionId(Question $question): array
// public function findByQuestionId(int $questionId): array
{
    $request = $this->db->prepare('SELECT * FROM Reponse WHERE question_id = :question_id');
    // $request->execute([':question_id' => $questionId]);
    $request->execute([':question_id' => $question->getId()]);
    $reponsesData = $request->fetchAll(PDO::FETCH_ASSOC);

return array_map(fn($r) => ReponseMapper::mapToObject($r, $question), $reponsesData);
}

}

?>