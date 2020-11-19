<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\ShowBlueprintItem\ShowBlueprintItemQuery;
use App\Presentation\Api\Controller\ShowResourceItemController;

final class ShowBlueprintItemController extends ShowResourceItemController
{
    protected function getQueryClass(): string
    {
        return ShowBlueprintItemQuery::class;
    }
}
