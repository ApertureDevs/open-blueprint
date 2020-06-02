<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\CreateBlueprint\CreateBlueprintCommand;
use App\Presentation\Api\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class CreateBlueprintController extends CommandController
{
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->handle($request);

        return new JsonResponse($result->getResourceId(), JsonResponse::HTTP_CREATED);
    }

    protected function getCommandClass(): string
    {
        return CreateBlueprintCommand::class;
    }
}
