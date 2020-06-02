<?php

namespace App\Infrastructure\Persistence\EventStore;

use App\Core\SharedKernel\Domain\Event\Event;
use App\Core\SharedKernel\Domain\Event\EventRecord;
use App\Core\SharedKernel\Domain\Event\EventRecords;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class EventStore
{
    private EntityManagerInterface $entityManager;
    private SerializerInterface $serializer;
    private EventMap $eventMap;

    public function __construct(EntityManagerInterface $eventStoreEntityManager, SerializerInterface $serializer, EventMap $eventMap)
    {
        $this->entityManager = $eventStoreEntityManager;
        $this->serializer = $serializer;
        $this->eventMap = $eventMap;
    }

    public function append(EventRecords $eventRecords): void
    {
        $this->entityManager->getConnection()->beginTransaction();

        try {
            foreach ($eventRecords as $eventRecord) {
                $serializedEventRecord = $this->convertIntoStorableEventRecord($eventRecord);
                $this->entityManager->persist($serializedEventRecord);
            }
            $this->entityManager->flush();
            $this->entityManager->getConnection()->commit();
        } catch (\Exception $exception) {
            $this->entityManager->getConnection()->rollBack();

            throw new \RuntimeException("Error on storing event records: {$exception->getMessage()}", 0, $exception);
        }
    }

    public function loadRootAggregateEventRecords(string $rootAggregateId): EventRecords
    {
        $repository = $this->entityManager->getRepository(StorableEventRecord::class);
        $results = $repository->findBy(['aggregateRootId' => $rootAggregateId], ['playHead' => 'ASC']);

        $results = array_map(function ($storableEventRecord) {
            return $this->convertIntoDomainEventRecord($storableEventRecord);
        }, $results);

        return new EventRecords($results);
    }

    public function loadEventRecords(): EventRecords
    {
        $repository = $this->entityManager->getRepository(StorableEventRecord::class);
        $results = $repository->findBy([], ['recordDate' => 'ASC']);

        $results = array_map(function ($storableEventRecord) {
            return $this->convertIntoDomainEventRecord($storableEventRecord);
        }, $results);

        return new EventRecords($results);
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

    private function convertIntoDomainEventRecord(StorableEventRecord $storableEventRecord): EventRecord
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
