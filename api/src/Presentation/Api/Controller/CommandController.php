<?php

namespace App\Presentation\Api\Controller;

use App\Core\SharedKernel\Application\CommandInterface;
use App\Core\SharedKernel\Application\CommandResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Serializer\SerializerInterface;

abstract class CommandController extends AbstractController
{
    protected MessageBusInterface $commandBus;
    protected SerializerInterface $serializer;

    public function __construct(MessageBusInterface $commandBus, SerializerInterface $serializer)
    {
        $this->commandBus = $commandBus;
        $this->serializer = $serializer;
    }

    protected function dispatchCommand(CommandInterface $command): CommandResponse
    {
        $envelope = $this->commandBus->dispatch($command);
        $stamp = $envelope->last(HandledStamp::class);

        if (!$stamp instanceof HandledStamp) {
            throw new \RuntimeException(sprintf('Command bus return any handled stamp. Is "%s" handler missing?', $this->getCommandClass()));
        }

        $result = $stamp->getResult();

        if (!$result instanceof CommandResponse) {
            throw new \RuntimeException('Command handler should only return instance of CommandResponse.');
        }

        return $result;
    }

    protected function generateCommandFromRequest(Request $request): CommandInterface
    {
        $command = $this->serializer->deserialize($request->getContent(), $this->getCommandClass(), 'json');
        $id = $request->get('id');

        if (null !== $id) {
            $command->id = $id;
        }

        if (!$command instanceof CommandInterface) {
            throw new \RuntimeException('Command controller should deserialize only one command.');
        }

        return $command;
    }

    protected function handle(Request $request): CommandResponse
    {
        $command = $this->generateCommandFromRequest($request);

        return $this->dispatchCommand($command);
    }

    abstract protected function getCommandClass(): string;
}
