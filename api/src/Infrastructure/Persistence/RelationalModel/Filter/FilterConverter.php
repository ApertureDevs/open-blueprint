<?php

namespace App\Infrastructure\Persistence\RelationalModel\Filter;

use App\Core\SharedKernel\Application\Filter\FilterInterface;
use App\Infrastructure\Persistence\RelationalModel\QueryNameGenerator;
use Doctrine\ORM\QueryBuilder;

abstract class FilterConverter
{
    protected QueryNameGenerator $queryNameGenerator;

    public function __construct(QueryNameGenerator $queryNameGenerator)
    {
        $this->queryNameGenerator = $queryNameGenerator;
    }

    abstract public function apply(QueryBuilder $queryBuilder, FilterInterface $filter): void;

    abstract public function supports(FilterInterface $filter): bool;
}
