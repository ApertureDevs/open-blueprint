<?php

namespace App\Core\Component\Craft\Application\ShowBlueprintItem;

use App\Core\SharedKernel\Application\QueryResponseInterface;

class ShowBlueprintItemResponse implements QueryResponseInterface
{
    public string $id;

    public string $name;

    public \DateTimeImmutable $createDate;

    public \DateTimeImmutable $updateDate;
}
