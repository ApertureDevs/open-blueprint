<?php

namespace App\Core\SharedKernel\Domain\Event\Team;

use App\Core\SharedKernel\Domain\Event\Event;

class TeamCreated implements Event
{
    private string $id;
    private string $blueprintId;
    private \DateTimeImmutable $createDate;

    public function __construct(string $id, string $blueprintId, \DateTimeImmutable $createDate)
    {
        $this->id = $id;
        $this->blueprintId = $blueprintId;
        $this->createDate = $createDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBlueprintId(): string
    {
        return $this->blueprintId;
    }

    public function getCreateDate(): \DateTimeImmutable
    {
        return $this->createDate;
    }
}
