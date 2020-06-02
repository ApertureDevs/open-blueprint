<?php

namespace App\Core\SharedKernel\Domain\Exception;

class ResourceNotFound extends \RuntimeException
{
    public function __construct(string $resource, string $id)
    {
        $message = sprintf('Resource "%s" with id %s not found.', $resource, $id);
        parent::__construct($message);
    }
}
