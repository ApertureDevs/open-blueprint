<?php

namespace App\Infrastructure\Projection\RelationalModel\Handler\BlueprintCreated;

use App\Core\SharedKernel\Application\EventHandlerInterface;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintCreated;
use App\Infrastructure\Persistence\RelationalModel\Repository\BlueprintRepository;
use App\Infrastructure\Projection\RelationalModel\Model\Blueprint;

class BlueprintCreatedHandler implements EventHandlerInterface
{
    private BlueprintRepository $blueprintRepository;

    public function __construct(BlueprintRepository $blueprintRepository)
    {
        $this->blueprintRepository = $blueprintRepository;
    }

    public function __invoke(BlueprintCreated $event): void
    {
        $blueprint = Blueprint::create($event->getId(), $event->getName(), $event->getCreateDate());
        $this->blueprintRepository->save($blueprint);
    }
}
