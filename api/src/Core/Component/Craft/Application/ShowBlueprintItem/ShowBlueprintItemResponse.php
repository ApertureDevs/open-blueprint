<?php

namespace App\Core\Component\Craft\Application\ShowBlueprintItem;

use App\Core\SharedKernel\Application\QueryItemResponse;

class ShowBlueprintItemResponse extends QueryItemResponse
{
    public string $name;

    public \DateTimeImmutable $createDate;

    public \DateTimeImmutable $updateDate;
}
