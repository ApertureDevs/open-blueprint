<?php

namespace App\Infrastructure\Persistence\RelationalModel\Filter;

use App\Core\SharedKernel\Application\Filter\FilterInterface;
use App\Core\SharedKernel\Application\Filter\TextFilter;
use Doctrine\ORM\QueryBuilder;

class TextFilterConverter extends FilterConverter
{
    public function apply(QueryBuilder $queryBuilder, FilterInterface $filter): void
    {
        if (!$filter instanceof TextFilter) {
            throw new \RuntimeException('Invalid filter given.');
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];
        $parameterName = $this->queryNameGenerator->generateParameterName('value');

        if (TextFilter::EXACT_SEARCH_TYPE === $filter->getSearchType()) {
            $queryBuilder->andWhere("{$rootAlias}.{$filter->getField()} = :{$parameterName}")
                ->setParameter($parameterName, $filter->getValue())
            ;

            return;
        }

        if (TextFilter::PARTIAL_SEARCH_TYPE === $filter->getSearchType()) {
            $queryBuilder->andWhere("{$rootAlias}.{$filter->getField()} LIKE :{$parameterName}")
                ->setParameter($parameterName, "%{$filter->getValue()}%")
            ;

            return;
        }

        throw new \RuntimeException("Unsupported filter type \"{$filter->getSearchType()}\" given.");
    }

    public function supports(FilterInterface $filter): bool
    {
        return $filter instanceof TextFilter;
    }
}
