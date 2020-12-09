<?php

namespace App\Core\SharedKernel\Domain\Exception;

class ResourceDeletedException extends \RuntimeException
{
    private function __construct(string $message)
    {
        parent::__construct($message);
    }

    public static function createResourceDeletedException(string $resource, string $id): self
    {
        $message = sprintf('Resource "%s" with id %s is deleted.', $resource, $id);

        return new self($message);
    }
}
