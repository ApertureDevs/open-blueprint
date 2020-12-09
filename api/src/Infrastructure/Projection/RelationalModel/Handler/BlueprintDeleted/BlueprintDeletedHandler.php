<?php

namespace App\Infrastructure\Projection\RelationalModel\Handler\BlueprintDeleted;

use App\Core\SharedKernel\Application\EventHandlerInterface;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintDeleted;
use App\Infrastructure\Persistence\RelationalModel\Repository\BlueprintRepository;
use App\Infrastructure\Projection\RelationalModel\Model\Blueprint;

class BlueprintDeletedHandler implements EventHandlerInterface
{
    private BlueprintRepository $blueprintRepository;

    public function __construct(BlueprintRepository $blueprintRepository)
    {
        $this->blueprintRepository = $blueprintRepository;
    }

    public function __invoke(BlueprintDeleted $event): void
    {
        $blueprint = $this->blueprintRepository->getEntity($event->getId());

        if (null === $blueprint) {
            throw new \RuntimeException("Given event has no existing relational model projection entity with id \"{$event->getId()}\".");
        }

        if (!$blueprint instanceof Blueprint) {
            throw new \RuntimeException('Invalid entity returned.');
        }

        $this->blueprintRepository->remove($blueprint);
    }
}
