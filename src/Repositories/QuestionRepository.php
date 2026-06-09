<?php

final class QuestionRepository
{
    public function __construct(
        private PDO $db
    ) {}

    public function findByQcm(Qcm $qcm): array
    {
        $request = $this->db->prepare('SELECT * FROM Question WHERE qcm_id =:qcm_id');
        $request->execute([':qcm_id' => $qcm->getId()]);
        $questionsDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        $questions = [];

        foreach ($questionsDatas as $questionsData) {
            $question = QuestionMapper::mapToObject($questionsData);
            $question->setQcm($qcm);
            $questions[] = $question;
        }

        return $questions;
    }
}
