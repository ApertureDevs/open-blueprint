<?php

namespace App\Core\Component\Craft\Application\DeleteBlueprint;

use App\Core\Component\Craft\Domain\Blueprint;
use App\Core\Component\Craft\Port\BlueprintRepositoryInterface;
use App\Core\SharedKernel\Application\CommandHandlerInterface;
use App\Core\SharedKernel\Application\CommandResponse;
use App\Core\SharedKernel\Domain\Exception\ResourceNotFoundException;

class DeleteBlueprintHandler implements CommandHandlerInterface
{
    private BlueprintRepositoryInterface $blueprintRepository;

    public function __construct(BlueprintRepositoryInterface $blueprintRepository)
    {
        $this->blueprintRepository = $blueprintRepository;
    }

    public function __invoke(DeleteBlueprintCommand $command): CommandResponse
    {
        $blueprint = $this->blueprintRepository->load($command->id);

        if (null === $blueprint) {
            throw ResourceNotFoundException::createResourceNotFoundWithIdException(Blueprint::class, $command->id);
        }

        $blueprint->delete();
        $this->blueprintRepository->store($blueprint);

        return CommandResponse::withResourceId($blueprint->getId());
    }
}
