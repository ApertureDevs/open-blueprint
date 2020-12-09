<?php

namespace App\Core\Component\Team\Application\ShowTeamItem;

use App\Core\Component\Team\Port\GetTeamItemRepositoryInterface;
use App\Core\SharedKernel\Application\QueryHandlerInterface;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;

class ShowTeamItemHandler implements QueryHandlerInterface
{
    private GetTeamItemRepositoryInterface $teamRepository;

    public function __construct(GetTeamItemRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function __invoke(ShowTeamItemQuery $query): ShowTeamItemResponse
    {
        $team = $this->teamRepository->getTeamItem($query->id);

        if (null === $team) {
            throw ResourceNotFoundException::createResourceNotFoundWithIdException(TeamItem::class, $query->id);
        }

        $response = new ShowTeamItemResponse();
        $response->id = $team->id;
        $response->blueprintId = $team->blueprintId;
        $response->createDate = $team->createDate;
        $response->updateDate = $team->updateDate;

        return $response;
    }
}
