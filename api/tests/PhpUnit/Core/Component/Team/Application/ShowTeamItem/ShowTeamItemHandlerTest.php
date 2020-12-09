<?php

namespace Tests\App\Core\Component\Team\Application\ShowTeamItem;

use App\Core\Component\Team\Application\ShowTeamItem\ShowTeamItemHandler;
use App\Core\Component\Team\Application\ShowTeamItem\ShowTeamItemQuery;
use App\Core\Component\Team\Port\GetTeamItemRepositoryInterface;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @covers \App\Core\Component\Team\Application\ShowTeamItem\ShowTeamItemHandler
 *
 * @internal
 */
class ShowTeamItemHandlerTest extends TestCase
{
    public function testItShouldThrowExceptionOnUnknownTeam(): void
    {
        $repository = $this->prophesize(GetTeamItemRepositoryInterface::class);
        $repository->getTeamItem(Argument::type('string'))->willReturn(null);
        $handler = new ShowTeamItemHandler($repository->reveal());
        $query = new ShowTeamItemQuery();
        $query->id = 'a511c7eb-987a-4c77-b746-9ae6d528e4b5';

        self::expectException(ResourceNotFoundException::class);
        $handler($query);
    }
}
