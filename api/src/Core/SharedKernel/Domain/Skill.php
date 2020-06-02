<?php

namespace App\Core\SharedKernel\Domain;

final class Skill
{
    public const PRINT = 'print';
    public const ELECTRONIC = 'electronic';
    public const CODE = 'code';

    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(Skill $comparedSkill): bool
    {
        return $this->value === $comparedSkill->getValue();
    }
}
