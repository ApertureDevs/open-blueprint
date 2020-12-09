<?php

namespace Tests\App\Infrastructure\Presentation\Api;

use App\Core\Component\Craft\Application\CreateBlueprint\CreateBlueprintCommand;
use App\Core\Component\Craft\Application\UpdateBlueprintInformation\UpdateBlueprintInformationCommand;
use App\Core\Component\Craft\Domain\Blueprint;
use App\Presentation\Api\CommandGenerator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * @covers \App\Infrastructure\Presentation\Api\CommandGenerator
 *
 * @internal
 */
class CommandGeneratorTest extends WebTestCase
{
    public function testItShouldGenerateCommandWithEmptyRequest(): void
    {
        $client = self::createClient();
        $container = $client->getContainer();
        $commandClass = CreateBlueprintCommand::class;
        $request = new Request();
        $serializer = $container->get('serializer');
        $generator = new CommandGenerator($serializer);

        $command = $generator->generate($request, $commandClass);

        self::assertInstanceOf(CreateBlueprintCommand::class, $command);
    }

    public function testItShouldGenerateCommandWithRequestWithData(): void
    {
        $client = self::createClient();
        $container = $client->getContainer();
        $commandClass = UpdateBlueprintInformationCommand::class;
        $request = new Request(['id' => '60495201-ef04-4f33-944a-cf11db09620b'], [], [], [], [], [], '{"name":"aperture toaster"}');
        $serializer = $container->get('serializer');
        $generator = new CommandGenerator($serializer);

        $command = $generator->generate($request, $commandClass);

        self::assertInstanceOf(UpdateBlueprintInformationCommand::class, $command);
        self::assertSame('60495201-ef04-4f33-944a-cf11db09620b', $command->id);
        self::assertSame('aperture toaster', $command->name);
    }

    public function testItShouldThrowExceptionOnInvalidClassGiven(): void
    {
        $client = self::createClient();
        $container = $client->getContainer();
        $queryClass = Blueprint::class;
        $request = new Request();
        $serializer = $container->get('serializer');
        $generator = new CommandGenerator($serializer);

        self::expectException(\InvalidArgumentException::class);
        $generator->generate($request, $queryClass);
    }
}
