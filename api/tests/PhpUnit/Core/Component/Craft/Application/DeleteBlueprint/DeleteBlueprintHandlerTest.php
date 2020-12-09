<?php

namespace Tests\App\Core\Component\Craft\Application\DeleteBlueprint;

use App\Core\Component\Craft\Application\DeleteBlueprint\DeleteBlueprintCommand;
use App\Core\Component\Craft\Application\DeleteBlueprint\DeleteBlueprintHandler;
use App\Core\Component\Craft\Port\BlueprintRepositoryInterface;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @covers \App\Core\Component\Craft\Application\DeleteBlueprint\DeleteBlueprintHandler
 *
 * @internal
 */
class DeleteBlueprintHandlerTest extends TestCase
{
    public function testItShouldThrowExceptionOnUnknownBlueprint(): void
    {
        $repository = $this->prophesize(BlueprintRepositoryInterface::class);
        $repository->load(Argument::type('string'))->willReturn(null);
        $handler = new DeleteBlueprintHandler($repository->reveal());
        $command = new DeleteBlueprintCommand();
        $command->id = 'a511c7eb-987a-4c77-b746-9ae6d528e4b5';

        self::expectException(ResourceNotFoundException::class);
        $handler($command);
    }
}
