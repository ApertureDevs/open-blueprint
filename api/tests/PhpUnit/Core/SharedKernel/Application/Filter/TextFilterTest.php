<?php

namespace Tests\App\Core\SharedKernel\Application\Filter;

use App\Core\SharedKernel\Application\Filter\TextFilter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Core\SharedKernel\Application\Filter\TextFilter
 *
 * @internal
 */
class TextFilterTest extends TestCase
{
    public function testItShouldCreateExactSearchType()
    {
        $filter = new TextFilter('name', 'aperture', TextFilter::EXACT_SEARCH_TYPE);

        $this->assertSame('name', $filter->getField());
        $this->assertSame('exact', $filter->getSearchType());
        $this->assertEquals('aperture', $filter->getValue());
    }

    public function testItShouldCreatePartialSearchType()
    {
        $filter = new TextFilter('name', 'aperture', TextFilter::PARTIAL_SEARCH_TYPE);

        $this->assertSame('name', $filter->getField());
        $this->assertSame('partial', $filter->getSearchType());
        $this->assertEquals('aperture', $filter->getValue());
    }

    public function testItShouldThrowExceptionOnInvalidSearchType()
    {
        self::expectException(\InvalidArgumentException::class);
        new TextFilter('name', 'aperture', 'unknown');
    }
}
