<?php

namespace App\Core\SharedKernel\Application\Filter;

class DateFilter implements FilterInterface
{
    public const AFTER_SEARCH_TYPE = 'after';
    public const BEFORE_SEARCH_TYPE = 'before';

    private string $field;

    private \DateTimeInterface $value;

    private string $searchType;

    public function __construct(string $field, \DateTimeInterface $value, string $searchType)
    {
        if (!in_array($searchType, self::getAvailableSearchType())) {
            throw new \InvalidArgumentException('Invalid search type given.');
        }
        $this->field = $field;
        $this->value = $value;
        $this->searchType = $searchType;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getValue(): \DateTimeInterface
    {
        return $this->value;
    }

    public function getSearchType(): string
    {
        return $this->searchType;
    }

    public static function getAvailableSearchType(): array
    {
        return [self::AFTER_SEARCH_TYPE, self::BEFORE_SEARCH_TYPE];
    }
}
