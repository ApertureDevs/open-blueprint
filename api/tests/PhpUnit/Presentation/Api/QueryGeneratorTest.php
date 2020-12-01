<?php

namespace App\Tests\PhpUnit\Presentation\Api;

use App\Core\Component\Craft\Application\CreateBlueprint\CreateBlueprintCommand;
use App\Core\Component\Craft\Application\ShowBlueprintCollection\ShowBlueprintCollectionQuery;
use App\Core\Component\Craft\Application\ShowBlueprintItem\ShowBlueprintItemQuery;
use App\Core\Component\Craft\Application\UpdateBlueprintInformation\UpdateBlueprintInformationCommand;
use App\Core\Component\Craft\Domain\Blueprint;
use App\Core\SharedKernel\Application\Filter\DateFilter;
use App\Core\SharedKernel\Application\Filter\TextFilter;
use App\Presentation\Api\CommandGenerator;
use App\Presentation\Api\QueryGenerator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class QueryGeneratorTest extends WebTestCase
{
    public function testItShouldGenerateShowItemQuery()
    {
        $queryClass = ShowBlueprintItemQuery::class;
        $request = new Request(['id' => '60495201-ef04-4f33-944a-cf11db09620b']);
        $generator = new QueryGenerator();

        $query = $generator->generate($request, $queryClass);

        self::assertInstanceOf(ShowBlueprintItemQuery::class, $query);
    }

    public function testItShouldThrowExceptionOnGenerateShowItemQueryWithoutId()
    {
        $queryClass = ShowBlueprintItemQuery::class;
        $request = new Request();
        $generator = new QueryGenerator();

        self::expectException(\RuntimeException::class);
        $generator->generate($request, $queryClass);
    }

    public function testItShouldGenerateShowCollectionQuery()
    {
        $queryClass = ShowBlueprintCollectionQuery::class;
        $request = new Request();
        $generator = new QueryGenerator();

        $query = $generator->generate($request, $queryClass);

        self::assertInstanceOf(ShowBlueprintCollectionQuery::class, $query);
    }

    public function testItShouldGenerateShowCollectionQueryWithFilter()
    {
        $queryClass = ShowBlueprintCollectionQuery::class;
        $request = new Request([
            'name' => ['exact' => 'aperture'],
            'createDate' => ['after' => '2020-01-01'],
        ]);
        $generator = new QueryGenerator();

        $query = $generator->generate($request, $queryClass);

        self::assertInstanceOf(ShowBlueprintCollectionQuery::class, $query);
        self::assertCount(2, $query->filters);
        self::assertInstanceOf(TextFilter::class, $query->filters[0]);
        self::assertInstanceOf(DateFilter::class, $query->filters[1]);
    }

    public function testItShouldThrowExceptionOnInvalidClassGiven()
    {
        $queryClass = Blueprint::class;
        $request = new Request();
        $generator = new QueryGenerator();

        self::expectException(\InvalidArgumentException::class);
        $generator->generate($request, $queryClass);
    }

}
