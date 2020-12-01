<?php

namespace App\Infrastructure\Persistence\RelationalModel\Filter;

class FilterConverterCollection
{
    /** @var iterable<FilterConverter> */
    protected iterable $filters;

    /**
     * @param iterable<FilterConverter> $filters
     */
    public function __construct(iterable $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return iterable<FilterConverter>
     */
    public function getAll(): iterable
    {
        return $this->filters;
    }
}
