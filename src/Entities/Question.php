<?php

final class Question
{

    private Qcm $qcm;
    private array $reponses;
    
    public function __construct(
        private int $id,
        private string $intitule,
        private int $tempsLimite,

    ) {
        $this->reponses = [];

    }

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

 public function getReponses(): array
    {
        return $this->reponses;
    }

    public function setReponses(array $reponses): self
    {
        $this->reponses = $reponses;
        return $this;
    }

    public function addReponse(Reponse $reponse): self
    {
        $this->reponses[] = $reponse;
        return $this;
    }





}
