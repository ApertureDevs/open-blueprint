<?php

namespace App\Infrastructure\Persistence\EventStore\Repository;

use App\Core\SharedKernel\Domain\AggregateRoot;
use App\Infrastructure\Event\EventManager;
use App\Infrastructure\Persistence\EventStore\EventStore;
use App\Infrastructure\Persistence\EventStore\Factory\AggregateRootFactory;

abstract class AggregateRootRepository
{
    protected EventStore $eventStore;
    protected EventManager $eventManager;
    protected AggregateRootFactory $aggregateRootFactory;

    public function __construct(EventStore $eventStore, EventManager $eventManager, AggregateRootFactory $aggregateRootFactory)
    {
        $this->eventStore = $eventStore;
        $this->eventManager = $eventManager;
        $this->aggregateRootFactory = $aggregateRootFactory;
    }

    public function store(AggregateRoot $blueprint): void
    {
        $eventRecords = $blueprint->getUncommittedEventRecords();
        $this->eventStore->append($eventRecords);
        $this->eventManager->dispatch($eventRecords);
    }

    /** @return AggregateRoot */
    abstract public function load(string $id);

    protected function generateFromEventStore(string $id, string $className): ?AggregateRoot
    {
        $eventRecords = $this->eventStore->loadRootAggregateEventRecords($id);

        if (0 === count($eventRecords)) {
            return null;
        }

        return $this->aggregateRootFactory->create($className, $eventRecords);
    }
}
