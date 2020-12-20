<?php

namespace App\Infrastructure\Persistence\EventStore;

class EventMap
{
    private const EVENT_DIR = 'App\\Core\\SharedKernel\\Domain\\Event\\';

    public static function getClassName(string $eventType, string $context): string
    {
        $className = self::EVENT_DIR.self::toUpperCamelCase($context).'\\'.self::toUpperCamelCase($eventType);

        if (false === class_exists($className)) {
            throw new \RuntimeException("Unknown class name for \"{$eventType}\" event type in \"{$context}\" context.");
        }

        return $className;
    }

    public static function getContext(string $eventClassName): string
    {
        if (false === strpos($eventClassName, self::EVENT_DIR)) {
            throw new \RuntimeException('Given class name is not an event.');
        }

        $eventContext = str_replace(self::EVENT_DIR, '', $eventClassName);
        $eventContext = explode('\\', $eventContext)[0];

        return self::toSnakeCase($eventContext);
    }

    public static function getEventType(string $eventClassName): string
    {
        if (false === strpos($eventClassName, self::EVENT_DIR)) {
            throw new \RuntimeException('Given class name is not an event.');
        }

        $eventContext = str_replace(self::EVENT_DIR, '', $eventClassName);
        $eventContext = explode('\\', $eventContext)[1];

        return self::toSnakeCase($eventContext);
    }

    private static function toSnakeCase(string $value): string
    {
        $value = preg_replace('/[A-Z]/', '_\\0', lcfirst($value));

        if (false === is_string($value)) {
            throw new \RuntimeException('Cannot convert given string into snake case string.');
        }

        return strtolower($value);
    }

    private static function toUpperCamelCase(string $value): string
    {
        $value = preg_replace_callback('/(^|_|\.)+(.)/', function ($match) {
            return ('.' === $match[1] ? '_' : '').strtoupper($match[2]);
        }, $value);

        if (false === is_string($value)) {
            throw new \RuntimeException('Cannot convert given string into upper camel case string.');
        }

        return $value;
    }
}
