<?php 

final class Score 
{
    public function __construct(
        private int $id,
        private int $score,
        private Qcm $qcm,
        private int $joueur_id,
        private int $chrono
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;
        return $this;
    }

 public function getQcm(): Qcm
    {
        return $this->qcm;
    }

    public function setQcm(Qcm $qcm): self
    {
        $this->qcm = $qcm;
        return $this;
    }

    public function getJoueur_id(): int
    {
        return $this->joueur_id;
    }

    public function setJoueur_id(int $joueur_id): self
    {
        $this->joueur_id = $joueur_id;
        return $this;
    } 


    public function getChrono(): int
    {
        return $this->chrono;
    }

    public function setChrono(int $chrono): self
    {
        $this->chrono = $chrono;
        return $this;
    }
}



?>