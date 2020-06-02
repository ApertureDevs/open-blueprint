<?php

namespace App\Core\Component\Craft\Application\CreateBlueprint;

use App\Core\Component\Craft\Domain\Blueprint;
use App\Core\Component\Craft\Port\BlueprintRepositoryInterface;
use App\Core\SharedKernel\Application\CommandHandlerInterface;
use App\Core\SharedKernel\Application\CommandResponse;

class CreateBlueprintHandler implements CommandHandlerInterface
{
    private BlueprintRepositoryInterface $blueprintRepository;

    public function __construct(BlueprintRepositoryInterface $blueprintRepository)
    {
        $this->blueprintRepository = $blueprintRepository;
    }

    public function __invoke(CreateBlueprintCommand $command): CommandResponse
    {
        $blueprint = Blueprint::create($command->name);
        $this->blueprintRepository->store($blueprint);

        return CommandResponse::withResourceId($blueprint->getId());
    }
}
