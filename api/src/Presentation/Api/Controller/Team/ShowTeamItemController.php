<?php

namespace App\Presentation\Api\Controller\Team;

use App\Core\Component\Team\Application\ShowTeamItem\ShowTeamItemQuery;
use App\Core\Component\Team\Application\ShowTeamItem\ShowTeamItemResponse;
use App\Presentation\Api\Controller\QueryController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class ShowTeamItemController extends QueryController
{
    public function __invoke(Request $request): JsonResponse
    {
        /** @var ShowTeamItemResponse $result */
        $result = $this->handle($request);

        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }

    protected function getQueryClass(): string
    {
        return ShowTeamItemQuery::class;
    }
}
