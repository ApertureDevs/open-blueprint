<?php

namespace App\Core\SharedKernel\Domain\Exception;

class ResourceNotFoundException extends \RuntimeException
{
    private function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function createResourceNotFoundWithIdException(string $resource, string $id): self
    {
        $message = sprintf('Resource "%s" with id "%s" not found.', $resource, $id);

        return new self($message);
    }

    public static function createResourceNotFoundWithPropertyException(string $resource, string $property, string $value): self
    {
        $message = sprintf('Resource "%s" with property "%s" and value "%s" not found.', $resource, $property, $value);

        return new self($message);
    }
}
