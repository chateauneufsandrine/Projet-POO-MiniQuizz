<?php

final class Question
{
    public function __construct(
        private int $id,
        private string $intitule,
        private int $tempsLimite,
        private Qcm $qcm
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

    public function getIntitule(): string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;
        return $this;
    }

    public function getTempsLimite(): int
    {
        return $this->tempsLimite;
    }

    public function setTempsLimite(int $tempsLimite): self
    {
        $this->tempsLimite = $tempsLimite;
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
}
