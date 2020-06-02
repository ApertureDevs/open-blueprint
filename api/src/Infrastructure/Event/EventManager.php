<?php

namespace App\Infrastructure\Event;

use App\Core\SharedKernel\Domain\Event\EventRecord;
use App\Core\SharedKernel\Domain\Event\EventRecords;
use App\Infrastructure\Persistence\EventStore\EventStore;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class EventManager
{
    private EventStore $eventStore;
    private MessageBusInterface $eventBus;
    private LoggerInterface $logger;

    public function __construct(EventStore $eventStore, MessageBusInterface $eventBus, LoggerInterface $logger)
    {
        $this->eventStore = $eventStore;
        $this->eventBus = $eventBus;
        $this->logger = $logger;
    }

    public function dispatch(EventRecords $eventRecords): void
    {
        /** @var EventRecord $eventRecord */
        foreach ($eventRecords as $eventRecord) {
            try {
                $this->eventBus->dispatch($eventRecord->getEvent());
                $this->logger->info('Event Record dispatched successfully.', [
                    'event_record_id' => $eventRecord->getId(),
                    'aggregate_root_id' => $eventRecord->getAggregateRootId(),
                    'record_date' => $eventRecord->getRecordDate()->format('Y-m-d H:i:s'),
                ]);
            } catch (\Exception $exception) {
                $this->logger->error('Event Record failed to dispatch.', [
                    'event_record_id' => $eventRecord->getId(),
                    'aggregate_root_id' => $eventRecord->getAggregateRootId(),
                    'record_date' => $eventRecord->getRecordDate()->format('Y-m-d H:i:s'),
                    'exception_message' => $exception->getMessage(),
                ]);
            }
        }
    }
}
