<?php

namespace Tests\App\Infrastructure\Persistence\EventStore;

use App\Core\Component\Craft\Domain\Blueprint;
use App\Core\SharedKernel\Domain\Event\Event;
use App\Core\SharedKernel\Domain\Event\EventRecord;
use App\Infrastructure\Persistence\EventStore\EventMap;
use App\Infrastructure\Persistence\EventStore\EventRecordTransformer;
use App\Infrastructure\Persistence\EventStore\StorableEventRecord;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @covers \App\Infrastructure\Persistence\EventStore\EventRecordTransformer
 *
 * @internal
 */
class EventRecordTransformerTest extends WebTestCase
{
    public function testItShouldConvertIntoStorableEventRecord(): void
    {
        $eventRecord = $this->generateDomainEventRecord();
        $transformer = $this->generateEventRecordTransformer();

        $storableEventRecord = $transformer->convertIntoStorableEventRecord($eventRecord);

        self::assertSame($eventRecord->getId(), $storableEventRecord->getId());
        self::assertSame($eventRecord->getAggregateRootId(), $storableEventRecord->getAggregateRootId());
        self::assertSame($eventRecord->getPlayHead(), $storableEventRecord->getPlayHead());
        self::assertSame($eventRecord->getRecordDate(), $storableEventRecord->getRecordDate());
        self::assertSame('blueprint_created', $storableEventRecord->getEventType());
        self::assertSame('craft', $storableEventRecord->getContext());
        self::assertIsString($storableEventRecord->getEvent());
    }

    public function testItShouldConvertIntoDomainEventRecord(): void
    {
        $storableEventRecord = StorableEventRecord::createFromEventRecord($this->generateDomainEventRecord(), '{"id":"36341903-9a96-4094-9a15-a9e70031047d","name":"test","createDate":"2020-01-01"}', 'blueprint_created', 'craft');
        $transformer = $this->generateEventRecordTransformer();

        $eventRecord = $transformer->convertIntoDomainEventRecord($storableEventRecord);

        self::assertSame($storableEventRecord->getId(), $eventRecord->getId());
        self::assertSame($storableEventRecord->getAggregateRootId(), $eventRecord->getAggregateRootId());
        self::assertSame($storableEventRecord->getPlayHead(), $eventRecord->getPlayHead());
        self::assertSame($storableEventRecord->getRecordDate(), $eventRecord->getRecordDate());
        self::assertInstanceOf(Event::class, $eventRecord->getEvent());
    }

    private function generateEventRecordTransformer(): EventRecordTransformer
    {
        self::bootKernel();
        $container = self::$container;
        $serializer = $container->get(SerializerInterface::class);
        $eventMap = new EventMap();

        return new EventRecordTransformer($serializer, $eventMap);
    }

    private function generateDomainEventRecord(): EventRecord
    {
        $blueprint = Blueprint::create('test');
        $eventRecords = $blueprint->getUncommittedEventRecords();

        foreach ($eventRecords->getIterator() as $eventRecord) {
            return $eventRecord;
        }

        throw new \RuntimeException('No event record was generated.');
    }
}
