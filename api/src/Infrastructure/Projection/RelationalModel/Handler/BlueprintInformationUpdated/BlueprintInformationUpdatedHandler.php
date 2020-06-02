<?php

namespace App\Infrastructure\Projection\RelationalModel\Handler\BlueprintInformationUpdated;

use App\Core\SharedKernel\Application\EventHandlerInterface;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintInformationUpdated;
use App\Infrastructure\Persistence\RelationalModel\Repository\BlueprintRepository;

class BlueprintInformationUpdatedHandler implements EventHandlerInterface
{
    private BlueprintRepository $blueprintRepository;

    public function __construct(BlueprintRepository $blueprintRepository)
    {
        $this->blueprintRepository = $blueprintRepository;
    }

    public function __invoke(BlueprintInformationUpdated $event): void
    {
        $blueprint = $this->blueprintRepository->getEntity($event->getId());

        if (null === $blueprint) {
            throw new \RuntimeException("Given event has no existing relational model projection entity with id \"{$event->getId()}\".");
        }

        $blueprint->update($event->getName(), $event->getUpdateDate());
        $this->blueprintRepository->save($blueprint);
    }
}
