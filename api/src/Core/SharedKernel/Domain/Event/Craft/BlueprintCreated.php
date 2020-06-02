<?php

namespace App\Core\SharedKernel\Domain\Event\Craft;

use App\Core\SharedKernel\Domain\Event\Event;

class BlueprintCreated implements Event
{
    private string $id;
    private string $name;
    private \DateTimeImmutable $createDate;

    public function __construct(string $id, string $name, \DateTimeImmutable $createDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->createDate = $createDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreateDate(): \DateTimeImmutable
    {
        return $this->createDate;
    }
}
