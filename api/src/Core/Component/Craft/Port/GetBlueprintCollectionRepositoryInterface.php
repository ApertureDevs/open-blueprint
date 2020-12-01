<?php

namespace App\Core\Component\Craft\Port;

use App\Core\Component\Craft\Application\ShowBlueprintCollection\BlueprintCollection;
use App\Core\SharedKernel\Application\Filter\FilterInterface;

interface GetBlueprintCollectionRepositoryInterface
{
    /**
     * @param iterable<FilterInterface> $filters
     */
    public function getBlueprintCollection(iterable $filters): BlueprintCollection;
}
