<?php

namespace App\Presentation\Api;

use App\Core\SharedKernel\Application\CommandInterface;
use App\Core\SharedKernel\Application\QueryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class CommandGenerator
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function generate(Request $request, string $commandClass): CommandInterface
    {
        $content = $request->getContent();
        $command = new $commandClass();

        if (!empty($content)) {
            $command = $this->serializer->deserialize($request->getContent(), $commandClass, 'json');
        }

        $id = $request->get('id');

        if (null !== $id) {
            $command->id = $id;
        }

        if (!$command instanceof CommandInterface) {
            throw new \InvalidArgumentException(sprintf('queryClass should be an instance of "%s"', QueryInterface::class));
        }

        return $command;
    }
}
