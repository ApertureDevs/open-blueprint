<?php

namespace App\Infrastructure\Persistence\EventStore;

use App\Core\SharedKernel\Domain\Event\Craft\BlueprintCreated;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintInformationUpdated;
use App\Core\SharedKernel\Domain\Event\Team\TeamCreated;

class EventMap
{
    private const CONTEXT_CRAFT = 'craft';
    private const CONTEXT_TEAM = 'team';

    private const MAPPING = [
        BlueprintCreated::class => [
            'context' => self::CONTEXT_CRAFT,
            'event_type' => 'blueprint_created',
        ],
        BlueprintInformationUpdated::class => [
            'context' => self::CONTEXT_CRAFT,
            'event_type' => 'blueprint_information_updated',
        ],
        TeamCreated::class => [
            'context' => self::CONTEXT_TEAM,
            'event_type' => 'team_created',
        ],
    ];

    public static function getClassName(string $eventType, string $context): string
    {
        foreach (self::MAPPING as $className => $mapping) {
            if ($mapping['context'] === $context && $mapping['event_type'] === $eventType) {
                return $className;
            }
        }

        throw new \RuntimeException("Unknown class name for \"{$eventType}\" event type in \"{$context}\" context.");
    }

    public static function getContext(string $eventClassName): string
    {
        if (!array_key_exists($eventClassName, self::MAPPING)) {
            throw new \RuntimeException("Unknown context for \"{$eventClassName}\".");
        }

        return self::MAPPING[$eventClassName]['context'];
    }

    public static function getEventType(string $eventClassName): string
    {
        if (!array_key_exists($eventClassName, self::MAPPING)) {
            throw new \RuntimeException("Unknown event type for \"{$eventClassName}\".");
        }

        return self::MAPPING[$eventClassName]['event_type'];
    }
}
