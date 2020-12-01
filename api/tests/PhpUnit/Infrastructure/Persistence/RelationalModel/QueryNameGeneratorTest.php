<?php

namespace Tests\App\Infrastructure\Persistence\RelationalModel\Filter;

use App\Core\SharedKernel\Application\Filter\DateFilter;
use App\Core\SharedKernel\Application\Filter\TextFilter;
use App\Infrastructure\Persistence\RelationalModel\Filter\DateFilterConverter;
use App\Infrastructure\Persistence\RelationalModel\Filter\TextFilterConverter;
use App\Infrastructure\Persistence\RelationalModel\QueryNameGenerator;
use Doctrine\ORM\QueryBuilder;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @covers App\Infrastructure\Persistence\RelationalModel\QueryNameGenerator
 */
class QueryNameGeneratorTest extends TestCase
{
    public function testItShouldGenerateAliasName()
    {
        $queryNameGenerator = new QueryNameGenerator();
        self::assertSame('blueprint_alias_1', $queryNameGenerator->generateAliasName('blueprint'));
        self::assertSame('blueprint_alias_2', $queryNameGenerator->generateAliasName('blueprint'));
        self::assertSame('team_alias_3', $queryNameGenerator->generateAliasName('team'));
        self::assertSame('blueprint_alias_4', $queryNameGenerator->generateAliasName('blueprint'));
    }

    public function testItShouldGenerateParameterName()
    {
        $queryNameGenerator = new QueryNameGenerator();
        self::assertSame('name_parameter_1', $queryNameGenerator->generateParameterName('name'));
        self::assertSame('name_parameter_2', $queryNameGenerator->generateParameterName('name'));
        self::assertSame('createDate_parameter_3', $queryNameGenerator->generateParameterName('createDate'));
        self::assertSame('name_parameter_4', $queryNameGenerator->generateParameterName('name'));
    }
}
