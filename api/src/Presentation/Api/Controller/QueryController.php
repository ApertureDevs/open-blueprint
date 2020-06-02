<?php

namespace App\Presentation\Api\Controller;

use App\Core\SharedKernel\Application\QueryInterface;
use App\Core\SharedKernel\Application\QueryResponseInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Serializer\SerializerInterface;

abstract class QueryController extends AbstractController
{
    protected MessageBusInterface $queryBus;
    protected SerializerInterface $serializer;

    public function __construct(MessageBusInterface $queryBus, SerializerInterface $serializer)
    {
        $this->queryBus = $queryBus;
        $this->serializer = $serializer;
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

    protected function generateQueryFromRequest(Request $request): QueryInterface
    {
        $queryClass = $this->getQueryClass();
        $query = new $queryClass();

        $id = $request->get('id');

        if (null !== $id) {
            $query->id = $id;
        }

        return $query;
    }

    protected function handle(Request $request): QueryResponseInterface
    {
        $query = $this->generateQueryFromRequest($request);

        return $this->dispatchQuery($query);
    }

    abstract protected function getQueryClass(): string;
}
