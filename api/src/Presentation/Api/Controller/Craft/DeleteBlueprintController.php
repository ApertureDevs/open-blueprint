<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\DeleteBlueprint\DeleteBlueprintCommand;
use App\Presentation\Api\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class DeleteBlueprintController extends CommandController
{
    protected function getCommandClass(): string
    {
        return DeleteBlueprintCommand::class;
    }

    protected function getSuccessfulHttpCode(): int
    {
        return JsonResponse::HTTP_OK;
    }
}
