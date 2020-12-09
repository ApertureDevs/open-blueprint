<?php

namespace App\Core\SharedKernel\Domain\Event\Craft;

use App\Core\SharedKernel\Domain\Event\Event;

class BlueprintDeleted implements Event
{
    private string $id;
    private \DateTimeImmutable $deleteDate;

    public function __construct(string $id, \DateTimeImmutable $deleteDate)
    {
        $this->id = $id;
        $this->deleteDate = $deleteDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDeleteDate(): \DateTimeImmutable
    {
        return $this->deleteDate;
    }
}
