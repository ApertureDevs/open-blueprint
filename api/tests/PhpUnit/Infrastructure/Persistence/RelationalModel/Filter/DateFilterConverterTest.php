<?php

namespace Tests\App\Infrastructure\Persistence\RelationalModel\Filter;

use App\Core\SharedKernel\Application\Filter\DateFilter;
use App\Core\SharedKernel\Application\Filter\TextFilter;
use App\Infrastructure\Persistence\RelationalModel\Filter\DateFilterConverter;
use App\Infrastructure\Persistence\RelationalModel\QueryNameGenerator;
use Doctrine\ORM\QueryBuilder;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

/**
 * @covers \App\Infrastructure\Persistence\RelationalModel\Filter\DateFilterConverter
 *
 * @internal
 */
class DateFilterConverterTest extends TestCase
{
    public function testSupport()
    {
        $queryNameGenerator = $this->prophesize(QueryNameGenerator::class);
        $filterConverter = new DateFilterConverter($queryNameGenerator->reveal());
        $filter = $this->prophesize(DateFilter::class);
        self::assertTrue($filterConverter->supports($filter->reveal()));
        $filter = $this->prophesize(TextFilter::class);
        self::assertFalse($filterConverter->supports($filter->reveal()));
    }

    public function testApplyAfterSearchType()
    {
        $queryBuilder = $this->prophesize(QueryBuilder::class);
        $queryBuilder->getRootAliases()->willReturn(['root']);
        $queryBuilder->andWhere(Argument::any())->shouldBeCalled();
        $queryBuilder->andWhere(Argument::any())->willReturn($queryBuilder);
        $queryBuilder->setParameter(Argument::type('string'), Argument::type(\DateTimeInterface::class))->shouldBeCalled();
        $queryNameGenerator = $this->prophesize(QueryNameGenerator::class);
        $queryNameGenerator->generateParameterName(Argument::type('string'))->willReturn('parameter_name');
        $filterConverter = new DateFilterConverter($queryNameGenerator->reveal());
        $filter = new DateFilter('createDate', new \DateTime('2020-01-01'), DateFilter::AFTER_SEARCH_TYPE);
        $filterConverter->apply($queryBuilder->reveal(), $filter);
    }

    public function testApplyBeforeSearchType()
    {
        $queryBuilder = $this->prophesize(QueryBuilder::class);
        $queryBuilder->getRootAliases()->willReturn(['root']);
        $queryBuilder->andWhere(Argument::any())->shouldBeCalled();
        $queryBuilder->andWhere(Argument::any())->willReturn($queryBuilder);
        $queryBuilder->setParameter(Argument::type('string'), Argument::type(\DateTimeInterface::class))->shouldBeCalled();
        $queryNameGenerator = $this->prophesize(QueryNameGenerator::class);
        $queryNameGenerator->generateParameterName(Argument::type('string'))->willReturn('parameter_name');
        $filterConverter = new DateFilterConverter($queryNameGenerator->reveal());
        $filter = new DateFilter('createDate', new \DateTime('2020-01-01'), DateFilter::BEFORE_SEARCH_TYPE);
        $filterConverter->apply($queryBuilder->reveal(), $filter);
    }

    public function testThrowExceptionOnApplyWithAnUnsupportedFilter()
    {
        $queryBuilder = $this->prophesize(QueryBuilder::class);
        $queryNameGenerator = $this->prophesize(QueryNameGenerator::class);
        $filterConverter = new DateFilterConverter($queryNameGenerator->reveal());
        $filter = new TextFilter('name', 'aperture', TextFilter::EXACT_SEARCH_TYPE);
        self::expectException(\RuntimeException::class);
        $filterConverter->apply($queryBuilder->reveal(), $filter);
    }
}
