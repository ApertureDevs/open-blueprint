<?php

namespace App\Core\Component\Craft\Application\ShowBlueprintCollection;

use App\Core\Component\Craft\Application\ShowBlueprintItem\BlueprintItem;
use App\Core\SharedKernel\Application\QueryCollectionResponse;

class ShowBlueprintCollectionResponse extends QueryCollectionResponse
{
    /** @var iterable<BlueprintItem> */
    public iterable $items = [];
}
