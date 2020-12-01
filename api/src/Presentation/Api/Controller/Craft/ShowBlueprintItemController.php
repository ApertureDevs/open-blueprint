<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\ShowBlueprintItem\ShowBlueprintItemQuery;
use App\Presentation\Api\Controller\QueryController;

final class ShowBlueprintItemController extends QueryController
{
    protected function getQueryClass(): string
    {
        return ShowBlueprintItemQuery::class;
    }
}
