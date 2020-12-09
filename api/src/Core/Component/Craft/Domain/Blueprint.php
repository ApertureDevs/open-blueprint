<?php

namespace App\Core\Component\Craft\Domain;

use App\Core\SharedKernel\Domain\AggregateRoot;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintCreated;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintDeleted;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintInformationUpdated;
use App\Core\SharedKernel\Domain\Exception\ResourceDeletedException;

class Blueprint extends AggregateRoot
{
    private string $id;
    private string $name;
    private \DateTimeInterface $createDate;
    private \DateTimeInterface $updateDate;
    private ?\DateTimeInterface $deleteDate = null;

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
        if ($this->isDeleted()) {
            throw ResourceDeletedException::createResourceDeletedException(self::class, $this->id);
        }

        $this->apply(new BlueprintInformationUpdated($this->id, $name, new \DateTimeImmutable()));
    }

    public function delete(): void
    {
        if ($this->isDeleted()) {
            throw ResourceDeletedException::createResourceDeletedException(self::class, $this->id);
        }

        $this->apply(new BlueprintDeleted($this->id, new \DateTimeImmutable()));
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreateDate(): \DateTimeInterface
    {
        return $this->createDate;
    }

    public function getUpdateDate(): \DateTimeInterface
    {
        return $this->updateDate;
    }

    public function getDeleteDate(): ?\DateTimeInterface
    {
        return $this->deleteDate;
    }

    public function isDeleted(): bool
    {
        return null !== $this->deleteDate;
    }

    protected function applyBlueprintCreated(BlueprintCreated $event): void
    {
        $this->id = $event->getId();
        $this->name = $event->getName();
        $this->createDate = $event->getCreateDate();
        $this->updateDate = $event->getCreateDate();
    }

    protected function applyBlueprintInformationUpdated(BlueprintInformationUpdated $event): void
    {
        $this->name = $event->getName();
        $this->updateDate = $event->getUpdateDate();
    }

    protected function applyBlueprintDeleted(BlueprintDeleted $event): void
    {
        $this->deleteDate = $event->getDeleteDate();
    }
}
