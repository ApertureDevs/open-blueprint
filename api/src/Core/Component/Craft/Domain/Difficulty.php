<?php

namespace App\Core\Component\Craft\Domain;

final class Difficulty
{
    public const EASY = 'easy';
    public const MEDIUM = 'medium';
    public const HARD = 'hard';

    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(Difficulty $comparedDifficulty): bool
    {
        return $this->value === $comparedDifficulty->getValue();
    }
}
