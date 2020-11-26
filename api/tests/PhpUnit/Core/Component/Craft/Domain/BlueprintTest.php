<?php

namespace Tests\App\Core\Component\Craft\Domain;

use App\Core\Component\Craft\Domain\Blueprint;
use PHPUnit\Framework\TestCase;

/**
 * @covers App\Core\Component\Craft\Domain\Blueprint
 */
class BlueprintTest extends TestCase
{
    public function testItShouldGenerateAnIdOnCreate() {
        $blueprint = Blueprint::create('test');

        $this->assertNotEmpty($blueprint->getId());
        $this->assertIsString($blueprint->getId());
        $this->assertSame(36, strlen($blueprint->getId()));
    }
}
