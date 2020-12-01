<?php

namespace App\Core\SharedKernel\Application;

use App\Core\SharedKernel\Application\Filter\FilterInterface;

abstract class QueryCollection implements QueryInterface
{
    /** @var iterable<FilterInterface> */
    public iterable $filters = [];
}
