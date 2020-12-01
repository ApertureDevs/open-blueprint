<?php

namespace App\Infrastructure\Projection\RelationalModel\Handler\TeamCreated;

use App\Core\SharedKernel\Application\EventHandlerInterface;
use App\Core\SharedKernel\Domain\Event\Team\TeamCreated;
use App\Infrastructure\Persistence\RelationalModel\Repository\BlueprintRepository;
use App\Infrastructure\Persistence\RelationalModel\Repository\TeamRepository;
use App\Infrastructure\Projection\RelationalModel\Model\Blueprint;
use App\Infrastructure\Projection\RelationalModel\Model\Team;

class TeamCreatedHandler implements EventHandlerInterface
{
    private TeamRepository $teamRepository;
    private BlueprintRepository $blueprintRepository;

    public function __construct(TeamRepository $teamRepository, BlueprintRepository $blueprintRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->blueprintRepository = $blueprintRepository;
    }

    public function __invoke(TeamCreated $event): void
    {
        $blueprint = $this->blueprintRepository->getEntity($event->getBlueprintId());

        if (null === $blueprint) {
            throw new \RuntimeException("Blueprint with id \"{$event->getBlueprintId()}\" not found in relational model.");
        }

        if (!$blueprint instanceof Blueprint) {
            throw new \RuntimeException('Invalid entity returned.');
        }

        $team = Team::create($event->getId(), $blueprint, $event->getCreateDate());
        $this->teamRepository->save($team);
    }
}
