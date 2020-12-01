<?php

namespace App\Core\SharedKernel\Application\Filter;

interface FilterInterface
{
    public function getField(): string;

    public function getSearchType(): string;

    /**
     * @return array<string>
     */
    public static function getAvailableSearchType(): array;
}
