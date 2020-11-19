<?php

namespace App\Presentation\Api\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

abstract class CreateResourceController extends CommandController
{
    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->handle($request);

        return new JsonResponse(['id' => $result->getResourceId()], JsonResponse::HTTP_CREATED);
    }
}
