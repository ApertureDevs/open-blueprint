<?php

namespace App\Presentation\Api\Controller;

use App\Core\SharedKernel\Application\QueryInterface;
use App\Core\SharedKernel\Application\QueryResponseInterface;
use App\Presentation\Api\QueryGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Serializer\SerializerInterface;

abstract class QueryController extends AbstractController
{
    protected MessageBusInterface $queryBus;
    protected SerializerInterface $serializer;
    protected QueryGenerator $queryGenerator;

    public function __construct(MessageBusInterface $queryBus, SerializerInterface $serializer, QueryGenerator $queryGenerator)
    {
        $this->queryBus = $queryBus;
        $this->serializer = $serializer;
        $this->queryGenerator = $queryGenerator;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->handle($request);

        return new JsonResponse($result, JsonResponse::HTTP_OK);
    }

    protected function dispatchQuery(QueryInterface $query): QueryResponseInterface
    {
        $envelope = $this->queryBus->dispatch($query);

        $stamp = $envelope->last(HandledStamp::class);

        if (!$stamp instanceof HandledStamp) {
            throw new \RuntimeException(sprintf('Query bus return any handled stamp. Is "%s" handler missing?', $this->getQueryClass()));
        }

        return $stamp->getResult();
    }

    protected function handle(Request $request): QueryResponseInterface
    {
        return $this->dispatchQuery($this->queryGenerator->generate($request, $this->getQueryClass()));
    }

    abstract protected function getQueryClass(): string;
}
