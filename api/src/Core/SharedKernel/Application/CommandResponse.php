<?php

namespace App\Core\SharedKernel\Application;

class CommandResponse
{
    private ?string $resourceId;

    private function __construct()
    {
    }

    public static function withResourceId(string $resourceId): CommandResponse
    {
        $commandResponse = new CommandResponse();
        $commandResponse->resourceId = $resourceId;

        return $commandResponse;
    }

    public function getResourceId(): ?string
    {
        return $this->resourceId;
    }
}
