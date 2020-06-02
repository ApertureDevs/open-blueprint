<?php

namespace App\Core\SharedKernel\Domain\Event\Craft;

use App\Core\SharedKernel\Domain\Event\Event;

class BlueprintInformationUpdated implements Event
{
    private string $id;
    private string $name;
    private \DateTimeImmutable $updateDate;

    public function __construct(string $id, string $name, \DateTimeImmutable $updateDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->updateDate = $updateDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUpdateDate(): \DateTimeImmutable
    {
        return $this->updateDate;
    }
}
