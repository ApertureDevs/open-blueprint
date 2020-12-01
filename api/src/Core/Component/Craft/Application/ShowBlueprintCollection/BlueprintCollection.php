<?php

namespace App\Core\Component\Craft\Application\ShowBlueprintCollection;

use App\Core\Component\Craft\Application\ShowBlueprintItem\BlueprintItem;

class BlueprintCollection
{
    /** @var iterable<BlueprintItem> */
    public iterable $items = [];

    public int $totalItems;
}
