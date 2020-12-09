<?php

namespace App\Infrastructure\Persistence\EventStore;

use App\Core\SharedKernel\Domain\Event\Event;
use App\Core\SharedKernel\Domain\Event\EventRecord;
use Symfony\Component\Serializer\SerializerInterface;

class EventRecordTransformer
{
    private SerializerInterface $serializer;
    private EventMap $eventMap;

    public function __construct(SerializerInterface $serializer, EventMap $eventMap)
    {
        $this->serializer = $serializer;
        $this->eventMap = $eventMap;
    }

    public function convertIntoStorableEventRecord(EventRecord $eventRecord): StorableEventRecord
    {
        $storableEvent = $this->serializer->serialize($eventRecord->getEvent(), 'json');

        return StorableEventRecord::createFromEventRecord(
            $eventRecord,
            $storableEvent,
            $this->eventMap::getEventType(get_class($eventRecord->getEvent())),
            $this->eventMap::getContext(get_class($eventRecord->getEvent()))
        );
    }

    public function convertIntoDomainEventRecord(StorableEventRecord $storableEventRecord): EventRecord
    {
        $event = $this->serializer->deserialize($storableEventRecord->getEvent(), $this->eventMap::getClassName($storableEventRecord->getEventType(), $storableEventRecord->getContext()), 'json');

        if (!$event instanceof Event) {
            throw new \RuntimeException('Deserialize object should be an Event instance.');
        }

        return EventRecord::fromEventStore(
            $storableEventRecord->getId(),
            $storableEventRecord->getAggregateRootId(),
            $storableEventRecord->getPlayHead(),
            $event,
            $storableEventRecord->getRecordDate()
        );
    }
}
