<?php

namespace App\Infrastructure\Persistence\RelationalModel\Filter;

use App\Core\SharedKernel\Application\Filter\DateFilter;
use App\Core\SharedKernel\Application\Filter\FilterInterface;
use Doctrine\ORM\QueryBuilder;

class DateFilterConverter extends FilterConverter
{
    public function apply(QueryBuilder $queryBuilder, FilterInterface $filter): void
    {
        if (!$filter instanceof DateFilter) {
            throw new \RuntimeException('Invalid filter given.');
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];
        $parameterName = $this->queryNameGenerator->generateParameterName('value');

        if (DateFilter::AFTER_SEARCH_TYPE === $filter->getSearchType()) {
            $queryBuilder->andWhere("{$rootAlias}.{$filter->getField()} >= :{$parameterName}")
                ->setParameter($parameterName, $filter->getValue())
            ;

            return;
        }

        if (DateFilter::BEFORE_SEARCH_TYPE === $filter->getSearchType()) {
            $queryBuilder->andWhere("{$rootAlias}.{$filter->getField()} <= :{$parameterName}")
                ->setParameter($parameterName, $filter->getValue())
            ;

            return;
        }

        throw new \RuntimeException("Unsupported filter type \"{$filter->getSearchType()}\" given.");
    }

    public function supports(FilterInterface $filter): bool
    {
        return $filter instanceof DateFilter;
    }
}
