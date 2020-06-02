<?php

namespace App\Core\Component\Team\Application\ShowTeamItem;

use App\Core\SharedKernel\Application\QueryResponseInterface;

class ShowTeamItemResponse implements QueryResponseInterface
{
    public string $id;

    public string $blueprintId;

    public \DateTimeImmutable $createDate;

    public \DateTimeImmutable $updateDate;
}
