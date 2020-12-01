<?php

namespace App\Core\SharedKernel\Application;

abstract class QueryCollectionResponse implements QueryResponseInterface
{
    /** @var iterable<QueryItemResponse> */
    public iterable $items = [];

    public int $totalItems;
}
