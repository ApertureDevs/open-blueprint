<?php

namespace App\Infrastructure\Persistence\EventStore\Repository\Team;

use App\Core\Component\Team\Domain\Team;
use App\Core\Component\Team\Port\TeamRepositoryInterface;
use App\Infrastructure\Persistence\EventStore\Repository\AggregateRootRepository;

final class TeamRepository extends AggregateRootRepository implements TeamRepositoryInterface
{
    public function load(string $id): ?Team
    {
        $team = $this->generateFromEventStore($id, Team::class);

        if (null === $team) {
            return null;
        }

        if (!$team instanceof Team) {
            throw new \RuntimeException('Invalid aggregate instance generated.');
        }

        return $team;
    }
}
