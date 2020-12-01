<?php

namespace App\Presentation\Api;

use App\Core\SharedKernel\Application\Filter\DateFilter;
use App\Core\SharedKernel\Application\Filter\TextFilter;
use App\Core\SharedKernel\Application\QueryCollection;
use App\Core\SharedKernel\Application\QueryInterface;
use App\Core\SharedKernel\Application\QueryItem;
use Symfony\Component\HttpFoundation\Request;

class QueryGenerator
{
    public function generate(Request $request, string $queryClass): QueryInterface
    {
        $query = new $queryClass();

        if ($query instanceof QueryItem) {
            return $this->generateQueryItem($request, $query);
        }

        if ($query instanceof QueryCollection) {
            return $this->generateQueryCollection($request, $query);
        }

        throw new \InvalidArgumentException(sprintf('queryClass should be an instance of "%s"', QueryInterface::class));
    }

    protected function generateQueryItem(Request $request, QueryItem $query): QueryItem
    {
        $id = $request->get('id');

        if (null === $id) {
            throw new \RuntimeException('QueryItem required an id.');
        }

        $query->id = $id;

        return $query;
    }

    protected function generateQueryCollection(Request $request, QueryCollection $query): QueryCollection
    {
        $filters = [];

        foreach ($request->query->all() as $parameterName => $parameterValue) {
            if (!is_array($parameterValue)) {
                continue;
            }

            foreach ($parameterValue as $filterType => $filterValue) {
                if (in_array($filterType, TextFilter::getAvailableSearchType())) {
                    $filters[] = new TextFilter($parameterName, $filterValue, $filterType);
                }

                if (in_array($filterType, DateFilter::getAvailableSearchType())) {
                    $filters[] = new DateFilter($parameterName, new \DateTime($filterValue), $filterType);
                }
            }
        }

        $query->filters = $filters;

        return $query;
    }
}
