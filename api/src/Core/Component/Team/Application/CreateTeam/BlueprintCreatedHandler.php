<?php

namespace App\Core\Component\Team\Application\CreateTeam;

use App\Core\Component\Team\Domain\Team;
use App\Core\Component\Team\Port\TeamRepositoryInterface;
use App\Core\SharedKernel\Application\EventHandlerInterface;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintCreated;

class BlueprintCreatedHandler implements EventHandlerInterface
{
    private TeamRepositoryInterface $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function __invoke(BlueprintCreated $event): void
    {
        $team = Team::create($event->getId());
        $this->teamRepository->store($team);
    }
}
