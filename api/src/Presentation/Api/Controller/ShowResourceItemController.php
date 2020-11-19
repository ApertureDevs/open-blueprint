<?php

namespace App\Presentation\Api\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

abstract class ShowResourceItemController extends QueryController
{
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->handle($request);

        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }
}
