<?php

namespace App\Core\Component\Issue\Domain;

final class Status
{
    public const OPEN = 'open';
    public const CLOSE = 'closet';

    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(Status $comparedStatus): bool
    {
        return $this->value === $comparedStatus->getValue();
    }
}
