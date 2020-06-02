<?php

namespace App\Core\Component\Craft\Port;

use App\Core\Component\Craft\Domain\Blueprint;

interface BlueprintRepositoryInterface
{
    public function store(Blueprint $blueprint): void;

    public function load(string $id): ?Blueprint;
}
