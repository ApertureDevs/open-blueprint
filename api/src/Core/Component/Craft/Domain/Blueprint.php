<?php

namespace App\Core\Component\Craft\Domain;

use App\Core\SharedKernel\Domain\AggregateRoot;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintCreated;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintInformationUpdated;

class Blueprint extends AggregateRoot
{
    private string $id;
    private string $name;

    public static function create(string $name): Blueprint
    {
        $blueprint = new Blueprint();
        $id = uuid_create(UUID_TYPE_RANDOM);

        if (null === $id) {
            throw new \RuntimeException('Blueprint id cannot be null.');
        }

        $blueprint->apply(new BlueprintCreated($id, $name, new \DateTimeImmutable()));

        return $blueprint;
    }

    public function updateInformation(string $name): void
    {
        $this->apply(new BlueprintInformationUpdated($this->id, $name, new \DateTimeImmutable()));
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function applyBlueprintCreated(BlueprintCreated $event): void
    {
        $this->id = $event->getId();
        $this->name = $event->getName();
    }

    protected function applyBlueprintUpdated(BlueprintInformationUpdated $event): void
    {
        $this->name = $event->getName();
    }
}
