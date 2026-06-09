<?php

final class Reponse
{
    public function __construct(
        private int $id,
        private string $intitule,
        private bool $correct_ou_non,
        private Question $question
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

    public function getCorrect_ou_non(): bool
    {
        return $this->correct_ou_non;
    }

    public function setCorrect_ou_non(bool $correct_ou_non): self
    {
        $this->correct_ou_non = $correct_ou_non;
        return $this;
    }

public function getQuestion(): Question
    {
        return $this->question;
    }

    public function setQuestion(Question $question): self
    {
        $this->question = $question;
        return $this;
    }
// public function getQuestions(): array
//     {
//         return $this->questions;
//     }

//     public function setQuestions(array $questions): self
//     {
//         $this->questions = $questions;
//         return $this;
//     } 

    public function addQuestion(Question $question): self
    {
        $this->questions[] = $question;
        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        $key = array_search($question, $this->questions, true);
        if ($key !== false) {
            unset($this->questions[$key]);
            $this->questions = array_values($this->questions);
        }
        return $this;
    }




   
}