<?php

namespace App\Core\Component\Team\Domain;

use App\Core\SharedKernel\Domain\AggregateRoot;
use App\Core\SharedKernel\Domain\Event\Team\TeamCreated;

class Team extends AggregateRoot
{
    private string $id;
    private Blueprint $blueprint;

    public static function create(string $blueprintId): Team
    {
        $team = new Team();
        $teamId = uuid_create(UUID_TYPE_RANDOM);

        if (null === $teamId) {
            throw new \RuntimeException('Team id cannot be null.');
        }

        $team->apply(new TeamCreated($teamId, $blueprintId, new \DateTimeImmutable()));

        return $team;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBlueprint(): Blueprint
    {
        return $this->blueprint;
    }

    protected function applyTeamCreated(TeamCreated $event): void
    {
        $this->id = $event->getId();
        $this->blueprint = new Blueprint($event->getId());
    }
}
