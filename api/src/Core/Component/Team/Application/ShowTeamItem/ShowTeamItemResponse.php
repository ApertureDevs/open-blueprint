<?php

namespace App\Core\Component\Team\Application\ShowTeamItem;

use App\Core\SharedKernel\Application\QueryItemResponse;

class ShowTeamItemResponse extends QueryItemResponse
{
    public string $id;

    public string $blueprintId;

    public \DateTimeImmutable $createDate;

    public \DateTimeImmutable $updateDate;
}
