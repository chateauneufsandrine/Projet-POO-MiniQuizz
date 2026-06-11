<?php

final class ScoreRepository
{
    public function __construct(
        private PDO $db
    ) {}

    public function insert(int $score, Qcm $qcm, Joueur $joueur, int $chrono): void
    {
        $request = $this->db->prepare('
            INSERT INTO Score (
                score,
                qcm_id,
                joueur_id,
                chrono
            )
            VALUES (
                :score,
                :qcm_id,
                :joueur_id,
                :chrono
            )
        ');

        $request->execute([
            ':score'     => $score,
            ':qcm_id'    => $qcm->getId(),
            ':joueur_id' => $joueur->getId(),
            ':chrono' => $chrono
        ]);
    }

    public function findAllByQcm(Qcm $qcm, JoueurRepository $joueurRepository): array
    {
        $request = $this->db->prepare('
            SELECT
                s.id,
                s.score,
                s.qcm_id,
                s.joueur_id,
                s.chrono,
                j.pseudo
            FROM Score s
            INNER JOIN Joueur j
                ON s.joueur_id = j.id
            WHERE s.qcm_id = :qcm_id
            ORDER BY s.score DESC, s.chrono ASC
        ');

        $request->execute([
            ':qcm_id' => $qcm->getId()
        ]);

        $scoresDatas = $request->fetchAll(PDO::FETCH_ASSOC);

        $scores = [];

        foreach ($scoresDatas as $scoreData) {
            $scoreData['qcm'] = $qcm;
            unset($scoreData['qcm_id']);

            $joueur = $joueurRepository->findById($scoreData['joueur_id']);
            $scoreData['joueur'] = $joueur;
            unset($scoreData['joueur_id']);

            $scores[] = ScoreMapper::mapToObject($scoreData);
        }


        
        return $scores;

       
    }

    public function findTop10ByQcm(Qcm $qcm): array
    {
        $request = $this->db->prepare('
            SELECT
                s.id,
                s.score,
                s.qcm_id,
                s.joueur_id,
                s.chrono,
                q.theme,
                q.description,
                j.pseudo
            FROM Score s
            INNER JOIN Qcm q
                ON s.qcm_id = q.id
            INNER JOIN Joueur j
                ON s.joueur_id = j.id
            WHERE s.qcm_id = :qcm_id
            ORDER BY s.score DESC, s.chrono ASC
            LIMIT 10
        ');

        $request->execute([
            ':qcm_id' => $qcm->getId()
        ]);

        $scoresData = $request->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            fn(array $scoreData) => ScoreMapper::mapToObject($scoreData),
            $scoresData
        );
    }
}