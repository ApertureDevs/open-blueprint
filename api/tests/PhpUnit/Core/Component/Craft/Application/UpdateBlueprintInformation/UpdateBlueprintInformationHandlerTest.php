<?php

namespace Tests\App\Core\Component\Craft\Application\UpdateBlueprintInformation;

use App\Core\Component\Craft\Application\UpdateBlueprintInformation\UpdateBlueprintInformationCommand;
use App\Core\Component\Craft\Application\UpdateBlueprintInformation\UpdateBlueprintInformationHandler;
use App\Core\Component\Craft\Port\BlueprintRepositoryInterface;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @covers \App\Core\Component\Craft\Application\UpdateBlueprintInformation\UpdateBlueprintInformationHandler
 *
 * @internal
 */
class UpdateBlueprintInformationHandlerTest extends TestCase
{
    public function testItShouldThrowExceptionOnUnknownBlueprint(): void
    {
        $repository = $this->prophesize(BlueprintRepositoryInterface::class);
        $repository->load(Argument::type('string'))->willReturn(null);
        $handler = new UpdateBlueprintInformationHandler($repository->reveal());
        $command = new UpdateBlueprintInformationCommand();
        $command->id = 'a511c7eb-987a-4c77-b746-9ae6d528e4b5';
        $command->name = 'new name';

        self::expectException(ResourceNotFoundException::class);
        $handler($command);
    }
}
