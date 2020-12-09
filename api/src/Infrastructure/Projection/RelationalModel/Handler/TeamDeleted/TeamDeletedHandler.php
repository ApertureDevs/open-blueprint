<?php

namespace App\Infrastructure\Projection\RelationalModel\Handler\TeamDeleted;

use App\Core\SharedKernel\Application\EventHandlerInterface;
use App\Core\SharedKernel\Domain\Event\Team\TeamDeleted;
use App\Infrastructure\Persistence\RelationalModel\Repository\TeamRepository;
use App\Infrastructure\Projection\RelationalModel\Model\Team;

class TeamDeletedHandler implements EventHandlerInterface
{
    private TeamRepository $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function __invoke(TeamDeleted $event): void
    {
        $team = $this->teamRepository->getEntity($event->getId());

        if (null === $team) {
            throw new \RuntimeException("Given event has no existing relational model projection entity with id \"{$event->getId()}\".");
        }

        if (!$team instanceof Team) {
            throw new \RuntimeException('Invalid entity returned.');
        }

        $this->teamRepository->remove($team);
    }
}
