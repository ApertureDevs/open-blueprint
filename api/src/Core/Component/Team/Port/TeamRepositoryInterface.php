<?php

namespace App\Core\Component\Team\Port;

use App\Core\Component\Team\Domain\Team;

interface TeamRepositoryInterface
{
    public function store(Team $team): void;

    public function load(string $id): ?Team;

    public function findIdWithBlueprintId(string $blueprintId): ?string;
}
