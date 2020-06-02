<?php

namespace App\Core\Component\Team\Port;

use App\Core\Component\Team\Application\ShowTeamItem\TeamItem;

interface GetTeamItemRepositoryInterface
{
    public function getTeamItem(string $id): ?TeamItem;
}
