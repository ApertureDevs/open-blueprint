<?php

namespace App\Core\SharedKernel\Domain\Event;

use App\Core\SharedKernel\Domain\AggregateRoot;

class EventRecord
{
    private string $id;
    private string $aggregateRootId;
    private int $playHead;
    private Event $event;
    private \DateTimeImmutable $recordDate;

    private function __construct(string $id, string $aggregateRootId, int $playhead, Event $event, \DateTimeImmutable $recordDate)
    {
        $this->id = $id;
        $this->aggregateRootId = $aggregateRootId;
        $this->playHead = $playhead;
        $this->event = $event;
        $this->recordDate = $recordDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAggregateRootId(): string
    {
        return $this->aggregateRootId;
    }

    public function getPlayHead(): int
    {
        return $this->playHead;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }

    public function getRecordDate(): \DateTimeImmutable
    {
        return $this->recordDate;
    }

    public static function record(AggregateRoot $aggregateRoot, int $playHead, Event $event): self
    {
        $id = uuid_create(UUID_TYPE_RANDOM);

        return new self($id, $aggregateRoot->getId(), $playHead, $event, new \DateTimeImmutable());
    }

    public static function fromEventStore(string $id, string $aggregateRootId, int $playHead, Event $event, \DateTimeImmutable $recordDate): self
    {
        return new self($id, $aggregateRootId, $playHead, $event, $recordDate);
    }
}
