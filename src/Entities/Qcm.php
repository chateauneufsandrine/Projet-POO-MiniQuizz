<?php

final class Qcm
{
    public function __construct(
        private int $id,
        private string $theme,
        private string $description,
        private array $questions
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

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function setQuestions(array $questions): self
    {
        $this->questions = $questions;
        return $this;
    } 

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
