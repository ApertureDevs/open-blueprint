<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\ShowBlueprintCollection\ShowBlueprintCollectionQuery;
use App\Presentation\Api\Controller\QueryController;

final class ShowBlueprintCollectionController extends QueryController
{
    protected function getQueryClass(): string
    {
        return ShowBlueprintCollectionQuery::class;
    }
}
