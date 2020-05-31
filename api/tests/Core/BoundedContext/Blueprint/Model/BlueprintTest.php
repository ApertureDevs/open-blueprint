<?php

namespace Tests\App\Core\BoundedContext\Blueprint\Model;

use App\Core\BoundedContext\Blueprint\Model\Blueprint;
use PHPUnit\Framework\TestCase;

/**
 * @covers App\Core\BoundedContext\Blueprint\Model\Blueprint
 */
class BlueprintTest extends TestCase
{
    public function testItShouldGenerateAnIdOnCreate() {
        $blueprint = new Blueprint('test');

        $this->assertNotEmpty($blueprint->getId());
        $this->assertIsString($blueprint->getId());
        $this->assertSame(36, strlen($blueprint->getId()));
    }
}
