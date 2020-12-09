<?php

namespace App\Core\Component\Craft\Application\ShowBlueprintItem;

use App\Core\Component\Craft\Port\GetBlueprintItemRepositoryInterface;
use App\Core\SharedKernel\Application\QueryHandlerInterface;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;

class ShowBlueprintItemHandler implements QueryHandlerInterface
{
    private GetBlueprintItemRepositoryInterface $blueprintRepository;

    public function __construct(GetBlueprintItemRepositoryInterface $blueprintRepository)
    {
        $this->blueprintRepository = $blueprintRepository;
    }

    public function __invoke(ShowBlueprintItemQuery $query): ShowBlueprintItemResponse
    {
        $blueprint = $this->blueprintRepository->getBlueprintItem($query->id);

        if (null === $blueprint) {
            throw ResourceNotFoundException::createResourceNotFoundWithIdException(BlueprintItem::class, $query->id);
        }

        $response = new ShowBlueprintItemResponse();
        $response->id = $blueprint->id;
        $response->name = $blueprint->name;
        $response->createDate = $blueprint->createDate;
        $response->updateDate = $blueprint->updateDate;

        return $response;
    }
}
