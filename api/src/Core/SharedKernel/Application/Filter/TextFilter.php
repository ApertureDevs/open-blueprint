<?php

namespace App\Core\SharedKernel\Application\Filter;

class TextFilter implements FilterInterface
{
    public const EXACT_SEARCH_TYPE = 'exact';
    public const PARTIAL_SEARCH_TYPE = 'partial';

    private string $field;

    private string $search;

    private string $searchType;

    public function __construct(string $field, string $value, string $searchType)
    {
        if (!in_array($searchType, self::getAvailableSearchType())) {
            throw new \InvalidArgumentException('Invalid search type given.');
        }
        $this->field = $field;
        $this->search = $value;
        $this->searchType = $searchType;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getValue(): string
    {
        return $this->search;
    }

    public function getSearchType(): string
    {
        return $this->searchType;
    }

    public static function getAvailableSearchType(): array
    {
        return [self::EXACT_SEARCH_TYPE, self::PARTIAL_SEARCH_TYPE];
    }
}
