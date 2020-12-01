<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\UpdateBlueprintInformation\UpdateBlueprintInformationCommand;
use App\Presentation\Api\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UpdateBlueprintController extends CommandController
{
    protected function getCommandClass(): string
    {
        return UpdateBlueprintInformationCommand::class;
    }

    protected function getSuccessfulHttpCode(): int
    {
        return JsonResponse::HTTP_OK;
    }
}
