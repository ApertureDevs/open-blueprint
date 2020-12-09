<?php

namespace Tests\App\Core\Component\Team\Domain;

use App\Core\Component\Team\Domain\Team;
use App\Core\SharedKernel\Domain\Exception\ResourceDeletedException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Core\Component\Team\Domain\Team
 *
 * @internal
 */
class TeamTest extends TestCase
{
    public function testItShouldCreate(): void
    {
        $team = Team::create('5fb27bef-bcdf-42fc-a27f-8f9554dad16f');

        $this->assertNotEmpty($team->getId());
        $this->assertIsString($team->getId());
        $this->assertSame(36, strlen($team->getId()));
        $this->assertSame('5fb27bef-bcdf-42fc-a27f-8f9554dad16f', $team->getBlueprint()->getId());
        $this->assertInstanceOf(\DateTimeInterface::class, $team->getCreateDate());
    }

    public function testItShouldThrowExceptionOnDeleteADeleted(): void
    {
        $team = Team::create('5fb27bef-bcdf-42fc-a27f-8f9554dad16f');
        $team->delete();

        self::expectException(ResourceDeletedException::class);

        $team->delete();
    }

    public function testItShouldDelete(): void
    {
        $team = Team::create('test');
        $team->delete();

        $this->assertTrue($team->isDeleted());
        $this->assertInstanceOf(\DateTimeInterface::class, $team->getDeleteDate());
    }
}
