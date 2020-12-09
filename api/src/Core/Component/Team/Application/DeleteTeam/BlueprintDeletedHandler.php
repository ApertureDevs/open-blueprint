<?php

namespace App\Core\Component\Team\Application\DeleteTeam;

use App\Core\Component\Team\Domain\Team;
use App\Core\Component\Team\Port\TeamRepositoryInterface;
use App\Core\SharedKernel\Application\EventHandlerInterface;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintDeleted;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;

class BlueprintDeletedHandler implements EventHandlerInterface
{
    private TeamRepositoryInterface $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function __invoke(BlueprintDeleted $event): void
    {
        $teamId = $this->teamRepository->findIdWithBlueprintId($event->getId());

        if (null === $teamId) {
            throw ResourceNotFoundException::createResourceNotFoundWithPropertyException(Team::class, 'blueprintId', $event->getId());
        }

        $team = $this->teamRepository->load($teamId);

        if (null === $team) {
            throw ResourceNotFoundException::createResourceNotFoundWithIdException(Team::class, $teamId);
        }

        $team->delete();
        $this->teamRepository->store($team);
    }
}
