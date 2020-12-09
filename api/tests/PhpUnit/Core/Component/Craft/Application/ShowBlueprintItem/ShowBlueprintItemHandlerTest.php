<?php

namespace Tests\App\Core\Component\Craft\Application\ShowBlueprintItem;

use App\Core\Component\Craft\Application\ShowBlueprintItem\ShowBlueprintItemHandler;
use App\Core\Component\Craft\Application\ShowBlueprintItem\ShowBlueprintItemQuery;
use App\Core\Component\Craft\Port\GetBlueprintItemRepositoryInterface;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @covers \App\Core\Component\Craft\Application\ShowBlueprintItem\ShowBlueprintItemHandler
 *
 * @internal
 */
class ShowBlueprintItemHandlerTest extends TestCase
{
    public function testItShouldThrowExceptionOnUnknownBlueprint(): void
    {
        $repository = $this->prophesize(GetBlueprintItemRepositoryInterface::class);
        $repository->getBlueprintItem(Argument::type('string'))->willReturn(null);
        $handler = new ShowBlueprintItemHandler($repository->reveal());
        $query = new ShowBlueprintItemQuery();
        $query->id = 'a511c7eb-987a-4c77-b746-9ae6d528e4b5';

        self::expectException(ResourceNotFoundException::class);
        $handler($query);
    }
}
