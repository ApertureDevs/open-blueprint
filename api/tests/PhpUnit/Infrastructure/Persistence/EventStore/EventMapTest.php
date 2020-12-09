<?php

namespace Tests\App\Infrastructure\Persistence\EventStore;

use App\Core\SharedKernel\Domain\Event\Craft\BlueprintCreated;
use App\Infrastructure\Persistence\EventStore\EventMap;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Infrastructure\Persistence\EventStore\EventMap
 *
 * @internal
 */
class EventMapTest extends TestCase
{
    public function testItShouldReturnEventClassName(): void
    {
        self::assertSame(BlueprintCreated::class, EventMap::getClassName('blueprint_created', 'craft'));
    }

    public function testGetEventClassNameShouldThrowExceptionOnUnknownEventType(): void
    {
        self::expectException(\RuntimeException::class);
        EventMap::getClassName('unknown', 'craft');
    }

    public function testGetEventClassNameShouldThrowExceptionOnUnknownEventContext(): void
    {
        self::expectException(\RuntimeException::class);
        EventMap::getClassName('blueprint_created', 'unknown');
    }

    public function testItShouldReturnEventContext(): void
    {
        self::assertSame('craft', EventMap::getContext(BlueprintCreated::class));
    }

    public function testGetEventContextShouldThrowExceptionOnUnknownEventClass(): void
    {
        self::expectException(\RuntimeException::class);
        EventMap::getContext(self::class);
    }

    public function testItShouldReturnEventType(): void
    {
        self::assertSame('blueprint_created', EventMap::getEventType(BlueprintCreated::class));
    }

    public function testGetEventTypeShouldThrowExceptionOnUnknownEventClass(): void
    {
        self::expectException(\RuntimeException::class);
        EventMap::getEventType(self::class);
    }
}
