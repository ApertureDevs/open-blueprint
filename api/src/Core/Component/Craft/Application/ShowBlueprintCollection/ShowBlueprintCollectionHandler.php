<?php

namespace App\Core\Component\Craft\Application\ShowBlueprintCollection;

use App\Core\Component\Craft\Port\GetBlueprintCollectionRepositoryInterface;
use App\Core\SharedKernel\Application\QueryHandlerInterface;

class ShowBlueprintCollectionHandler implements QueryHandlerInterface
{
    private GetBlueprintCollectionRepositoryInterface $blueprintRepository;

    public function __construct(GetBlueprintCollectionRepositoryInterface $blueprintRepository)
    {
        $this->blueprintRepository = $blueprintRepository;
    }

    public function __invoke(ShowBlueprintCollectionQuery $query): ShowBlueprintCollectionResponse
    {
        $blueprintCollection = $this->blueprintRepository->getBlueprintCollection($query->filters);
        $response = new ShowBlueprintCollectionResponse();
        $response->items = $blueprintCollection->items;
        $response->totalItems = $blueprintCollection->totalItems;

        return $response;
    }
}
