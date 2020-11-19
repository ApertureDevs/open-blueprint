<?php

namespace App\Presentation\Api\Controller\Team;

use App\Core\Component\Team\Application\ShowTeamItem\ShowTeamItemQuery;
use App\Presentation\Api\Controller\ShowResourceItemController;

final class ShowTeamItemController extends ShowResourceItemController
{
    protected function getQueryClass(): string
    {
        return ShowTeamItemQuery::class;
    }
}
