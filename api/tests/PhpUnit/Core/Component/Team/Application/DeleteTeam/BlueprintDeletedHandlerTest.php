<?php

namespace Tests\App\Core\Component\Team\Application\DeleteTeam;

use App\Core\Component\Team\Application\DeleteTeam\BlueprintDeletedHandler;
use App\Core\Component\Team\Port\TeamRepositoryInterface;
use App\Core\SharedKernel\Domain\Event\Craft\BlueprintDeleted;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @covers \App\Core\Component\Team\Application\DeleteTeam\BlueprintDeletedHandler
 *
 * @internal
 */
class BlueprintDeletedHandlerTest extends TestCase
{
    public function testItShouldThrowExceptionOnUnknownRelativeTeam(): void
    {
        $repository = $this->prophesize(TeamRepositoryInterface::class);
        $repository->findIdWithBlueprintId(Argument::type('string'))->willReturn(null);
        $handler = new BlueprintDeletedHandler($repository->reveal());
        $event = new BlueprintDeleted('a511c7eb-987a-4c77-b746-9ae6d528e4b5', new \DateTimeImmutable());

        self::expectException(ResourceNotFoundException::class);
        $handler($event);
    }

    public function testItShouldThrowExceptionOnUnknownTeam(): void
    {
        $repository = $this->prophesize(TeamRepositoryInterface::class);
        $repository->findIdWithBlueprintId(Argument::type('string'))->willReturn('7cb97c7e-3792-4766-aa88-3a1c92f9abbf');
        $repository->load(Argument::type('string'))->willReturn(null);
        $handler = new BlueprintDeletedHandler($repository->reveal());
        $event = new BlueprintDeleted('a511c7eb-987a-4c77-b746-9ae6d528e4b5', new \DateTimeImmutable());

        self::expectException(ResourceNotFoundException::class);
        $handler($event);
    }
}
