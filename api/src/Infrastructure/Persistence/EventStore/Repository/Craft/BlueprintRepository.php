<?php

namespace App\Infrastructure\Persistence\EventStore\Repository\Craft;

use App\Core\Component\Craft\Domain\Blueprint;
use App\Core\Component\Craft\Port\BlueprintRepositoryInterface;
use App\Infrastructure\Persistence\EventStore\Repository\AggregateRootRepository;

final class BlueprintRepository extends AggregateRootRepository implements BlueprintRepositoryInterface
{
    public function load(string $id): ?Blueprint
    {
        $blueprint = $this->generateFromEventStore($id, Blueprint::class);

        if (null === $blueprint) {
            return null;
        }

        if (!$blueprint instanceof Blueprint) {
            throw new \RuntimeException('Invalid aggregate instance generated.');
        }

        return $blueprint;
    }
}
