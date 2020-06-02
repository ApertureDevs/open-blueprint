<?php

namespace App\Core\Component\Craft\Port;

use App\Core\Component\Craft\Application\ShowBlueprintItem\BlueprintItem;

interface GetBlueprintItemRepositoryInterface
{
    public function getBlueprintItem(string $id): ?BlueprintItem;
}
