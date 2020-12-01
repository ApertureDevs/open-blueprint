<?php

namespace App\Presentation\Api\Controller\Team;

use App\Core\Component\Team\Application\ShowTeamItem\ShowTeamItemQuery;
use App\Presentation\Api\Controller\QueryController;

final class ShowTeamItemController extends QueryController
{
    protected function getQueryClass(): string
    {
        return ShowTeamItemQuery::class;
    }
}
