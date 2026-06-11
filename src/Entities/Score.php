<?php

final class Score
{
    public function __construct(
        private int $id,
        private int $score,
        private Qcm $qcm,         // ← objet Qcm conservé
        private Joueur $joueur,
        private string $chrono,    // ← corrigé int → string
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

    public function getJoueur(): Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(Joueur $joueur): self
    {
        $this->joueur = $joueur;
        return $this;
    }

    public function getChrono(): string
    {
        return $this->chrono;
    }

    public function setChrono(string $chrono): self
    {
        $this->chrono = $chrono;
        return $this;
    }
}