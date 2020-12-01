<?php

namespace Tests\App\Core\SharedKernel\Application\Filter;

use App\Core\Component\Craft\Domain\Blueprint;
use App\Core\SharedKernel\Application\Filter\DateFilter;
use PHPUnit\Framework\TestCase;

/**
 * @covers App\Core\SharedKernel\Application\Filter\DateFilter
 */
class DateFilterTest extends TestCase
{
    public function testItShouldCreateBeforeSearchType() {
        $filter = new DateFilter('createDate', new \DateTime('2020-01-01'), DateFilter::BEFORE_SEARCH_TYPE);

        $this->assertSame('createDate', $filter->getField());
        $this->assertSame('before', $filter->getSearchType());
        $this->assertEquals(new \DateTime('2020-01-01'), $filter->getValue());
    }

    public function testItShouldCreateAfterSearchType() {
        $filter = new DateFilter('createDate', new \DateTime('2020-01-01'), DateFilter::AFTER_SEARCH_TYPE);

        $this->assertSame('createDate', $filter->getField());
        $this->assertSame('after', $filter->getSearchType());
        $this->assertEquals(new \DateTime('2020-01-01'), $filter->getValue());
    }

    public function testItShouldThrowExceptionOnInvalidSearchType() {
        self::expectException(\InvalidArgumentException::class);
        new DateFilter('createDate', new \DateTime('2020-01-01'), 'unknown');
    }
}
