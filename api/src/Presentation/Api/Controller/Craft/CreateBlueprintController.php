<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\CreateBlueprint\CreateBlueprintCommand;
use App\Presentation\Api\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CreateBlueprintController extends CommandController
{
    protected function getCommandClass(): string
    {
        return CreateBlueprintCommand::class;
    }

    protected function getSuccessfulHttpCode(): int
    {
        return JsonResponse::HTTP_CREATED;
    }
}
