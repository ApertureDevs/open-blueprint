<?php

namespace App\Core\Component\Team\Domain;

final class Grant
{
    public const TEAM_MANAGEMENT = 'team_management';
    public const GRANT_MANAGEMENT = 'grant_management';
    public const RELEASE_MANAGEMENT = 'release_management';
    public const ISSUE_MANAGEMENT = 'issue_management';

    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqual(Grant $comparedGrant): bool
    {
        return $this->value === $comparedGrant->getValue();
    }
}
