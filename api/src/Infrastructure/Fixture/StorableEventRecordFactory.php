<?php

namespace App\Infrastructure\Fixture;

use App\Core\SharedKernel\Domain\Event\EventRecord;
use App\Infrastructure\Persistence\EventStore\EventMap;
use App\Infrastructure\Persistence\EventStore\StorableEventRecord;
use Symfony\Component\Serializer\SerializerInterface;

class StorableEventRecordFactory
{
    private SerializerInterface $serializer;

    private EventMap $eventMap;

    public function __construct(SerializerInterface $serializer, EventMap $eventMap)
    {
        $this->serializer = $serializer;
        $this->eventMap = $eventMap;
    }

    public function create(EventRecord $eventRecord): StorableEventRecord
    {
        $storableEvent = $this->serializer->serialize($eventRecord->getEvent(), 'json');

        return StorableEventRecord::createFromEventRecord(
            $eventRecord,
            $storableEvent,
            $this->eventMap::getEventType(get_class($eventRecord->getEvent())),
            $this->eventMap::getContext(get_class($eventRecord->getEvent()))
        );
    }
}
