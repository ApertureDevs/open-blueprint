<?php

namespace App\Infrastructure\Persistence\EventStore;

use App\Core\SharedKernel\Domain\Event\EventRecord;

class StorableEventRecord
{
    private string $id;
    private string $aggregateRootId;
    private string $context;
    private int $playHead;
    private string $event;
    private string $eventType;
    private \DateTimeImmutable $recordDate;

    private function __construct(string $id, string $aggregateRootId, string $context, int $playHead, string $event, string $eventType, \DateTimeImmutable $recordDate)
    {
        $this->id = $id;
        $this->aggregateRootId = $aggregateRootId;
        $this->context = $context;
        $this->playHead = $playHead;
        $this->event = $event;
        $this->eventType = $eventType;
        $this->recordDate = $recordDate;
    }

    public static function createFromEventRecord(EventRecord $eventRecord, string $event, string $eventType, string $context): StorableEventRecord
    {
        return new StorableEventRecord(
            $eventRecord->getId(),
            $eventRecord->getAggregateRootId(),
            $context,
            $eventRecord->getPlayHead(),
            $event,
            $eventType,
            $eventRecord->getRecordDate()
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAggregateRootId(): string
    {
        return $this->aggregateRootId;
    }

    public function getContext(): string
    {
        return $this->context;
    }

    public function getPlayHead(): int
    {
        return $this->playHead;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function getEventType(): string
    {
        return $this->eventType;
    }

    public function getRecordDate(): \DateTimeImmutable
    {
        return $this->recordDate;
    }
}
