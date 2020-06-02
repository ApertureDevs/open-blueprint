<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\UpdateBlueprintInformation\UpdateBlueprintInformationCommand;
use App\Presentation\Api\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class UpdateBlueprintController extends CommandController
{
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->handle($request);

        return new JsonResponse($result->getResourceId(), JsonResponse::HTTP_OK);
    }

    protected function getCommandClass(): string
    {
        return UpdateBlueprintInformationCommand::class;
    }
}
