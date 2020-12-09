<?php

namespace Tests\App\Infrastructure\Persistence\RelationalModel\Filter;

use App\Infrastructure\Persistence\RelationalModel\QueryNameGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Infrastructure\Persistence\RelationalModel\QueryNameGenerator
 *
 * @internal
 */
class QueryNameGeneratorTest extends TestCase
{
    public function testItShouldGenerateAliasName(): void
    {
        $queryNameGenerator = new QueryNameGenerator();
        self::assertSame('blueprint_alias_1', $queryNameGenerator->generateAliasName('blueprint'));
        self::assertSame('blueprint_alias_2', $queryNameGenerator->generateAliasName('blueprint'));
        self::assertSame('team_alias_3', $queryNameGenerator->generateAliasName('team'));
        self::assertSame('blueprint_alias_4', $queryNameGenerator->generateAliasName('blueprint'));
    }

    public function testItShouldGenerateParameterName(): void
    {
        $queryNameGenerator = new QueryNameGenerator();
        self::assertSame('name_parameter_1', $queryNameGenerator->generateParameterName('name'));
        self::assertSame('name_parameter_2', $queryNameGenerator->generateParameterName('name'));
        self::assertSame('createDate_parameter_3', $queryNameGenerator->generateParameterName('createDate'));
        self::assertSame('name_parameter_4', $queryNameGenerator->generateParameterName('name'));
    }
}
