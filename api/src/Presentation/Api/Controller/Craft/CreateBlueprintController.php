<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\CreateBlueprint\CreateBlueprintCommand;
use App\Presentation\Api\Controller\CreateResourceController;

final class CreateBlueprintController extends CreateResourceController
{
    protected function getCommandClass(): string
    {
        return CreateBlueprintCommand::class;
    }
}
