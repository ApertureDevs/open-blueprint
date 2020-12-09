<?php

namespace Tests\App\Core\Component\Craft\Domain;

use App\Core\Component\Craft\Domain\Blueprint;
use App\Core\SharedKernel\Domain\Exception\ResourceDeletedException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Core\Component\Craft\Domain\Blueprint
 *
 * @internal
 */
class BlueprintTest extends TestCase
{
    public function testItShouldCreate(): void
    {
        $blueprint = Blueprint::create('test');

        $this->assertNotEmpty($blueprint->getId());
        $this->assertIsString($blueprint->getId());
        $this->assertSame(36, strlen($blueprint->getId()));
        $this->assertInstanceOf(\DateTimeInterface::class, $blueprint->getCreateDate());
    }

    public function testItShouldUpdateInformation(): void
    {
        $blueprint = Blueprint::create('test');
        $blueprint->updateInformation('new test');

        $this->assertSame('new test', $blueprint->getName());
        $this->assertInstanceOf(\DateTimeInterface::class, $blueprint->getUpdateDate());
    }

    public function testItShouldThrowExceptionOnUpdateInformationADeleted(): void
    {
        $blueprint = Blueprint::create('test');
        $blueprint->delete();

        self::expectException(ResourceDeletedException::class);

        $blueprint->updateInformation('new test');
    }

    public function testItShouldThrowExceptionOnDeleteADeleted(): void
    {
        $blueprint = Blueprint::create('test');
        $blueprint->delete();

        self::expectException(ResourceDeletedException::class);

        $blueprint->delete();
    }

    public function testItShouldDelete(): void
    {
        $blueprint = Blueprint::create('test');
        $blueprint->delete();

        $this->assertTrue($blueprint->isDeleted());
        $this->assertInstanceOf(\DateTimeInterface::class, $blueprint->getDeleteDate());
    }
}
