<?php

namespace App\Infrastructure\Persistence\EventStore\Factory;

use App\Core\SharedKernel\Domain\AggregateRoot;
use App\Core\SharedKernel\Domain\Event\EventRecords;

class AggregateRootFactory
{
    public function create(string $aggregateRootClassName, EventRecords $eventRecords): AggregateRoot
    {
        $aggregate = new $aggregateRootClassName();
        $aggregate->initializeState($eventRecords);

        return $aggregate;
    }
}
