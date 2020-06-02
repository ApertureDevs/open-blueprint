<?php

namespace App\Core\SharedKernel\Domain;

use App\Core\SharedKernel\Domain\Event\Event;
use App\Core\SharedKernel\Domain\Event\EventRecord;
use App\Core\SharedKernel\Domain\Event\EventRecords;

abstract class AggregateRoot
{
    /** @var array<EventRecord> */
    private array $uncommittedEventRecords = [];
    private int $playHead = -1;

    public function apply(Event $event): void
    {
        $this->handleRecursively($event);

        ++$this->playHead;
        $this->uncommittedEventRecords[] = EventRecord::record(
            $this,
            $this->playHead,
            $event
        );
    }

    abstract public function getId(): string;

    public function getUncommittedEventRecords(): EventRecords
    {
        $eventRecords = new EventRecords($this->uncommittedEventRecords);

        $this->uncommittedEventRecords = [];

        return $eventRecords;
    }

    public function initializeState(EventRecords $eventRecords): void
    {
        /** @var EventRecord $eventRecord */
        foreach ($eventRecords as $eventRecord) {
            ++$this->playHead;
            $this->handleRecursively($eventRecord->getEvent());
        }
    }

    public function getPlayHead(): int
    {
        return $this->playHead;
    }

    protected function handle(Event $event): void
    {
        $method = $this->getApplyMethod($event);

        if (!method_exists($this, $method)) {
            return;
        }

        $this->{$method}($event);
    }

    protected function handleRecursively(Event $event): void
    {
        $this->handle($event);
    }

    private function getApplyMethod(Event $event): string
    {
        $classParts = explode('\\', get_class($event));

        return 'apply'.end($classParts);
    }
}
