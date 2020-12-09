<?php

namespace App\Core\Component\Team\Domain;

use App\Core\SharedKernel\Domain\AggregateRoot;
use App\Core\SharedKernel\Domain\Event\Team\TeamCreated;
use App\Core\SharedKernel\Domain\Event\Team\TeamDeleted;
use App\Core\SharedKernel\Domain\Exception\ResourceDeletedException;

class Team extends AggregateRoot
{
    private string $id;
    private Blueprint $blueprint;
    private \DateTimeInterface $createDate;
    private ?\DateTimeInterface $deleteDate = null;

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

    public function delete(): void
    {
        if ($this->isDeleted()) {
            throw ResourceDeletedException::createResourceDeletedException(self::class, $this->id);
        }

        $this->apply(new TeamDeleted($this->id, new \DateTimeImmutable()));
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBlueprint(): Blueprint
    {
        return $this->blueprint;
    }

    public function getCreateDate(): \DateTimeInterface
    {
        return $this->createDate;
    }

    public function getDeleteDate(): ?\DateTimeInterface
    {
        return $this->deleteDate;
    }

    public function isDeleted(): bool
    {
        return null !== $this->deleteDate;
    }

    protected function applyTeamCreated(TeamCreated $event): void
    {
        $this->id = $event->getId();
        $this->blueprint = new Blueprint($event->getBlueprintId());
        $this->createDate = $event->getCreateDate();
    }

    protected function applyTeamDeleted(TeamDeleted $event): void
    {
        $this->deleteDate = $event->getDeleteDate();
    }
}
