<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\ShowBlueprintItem\ShowBlueprintItemQuery;
use App\Core\Component\Craft\Application\ShowBlueprintItem\ShowBlueprintItemResponse;
use App\Presentation\Api\Controller\QueryController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class ShowBlueprintItemController extends QueryController
{
    public function __invoke(Request $request): JsonResponse
    {
        /** @var ShowBlueprintItemResponse $result */
        $result = $this->handle($request);

        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }

    protected function getQueryClass(): string
    {
        return ShowBlueprintItemQuery::class;
    }
}
