<?php

namespace App\Presentation\Api\Controller\Craft;

use App\Core\Component\Craft\Application\UpdateBlueprintInformation\UpdateBlueprintInformationCommand;
use App\Presentation\Api\Controller\UpdateResourceController;

final class UpdateBlueprintController extends UpdateResourceController
{
    protected function getCommandClass(): string
    {
        return UpdateBlueprintInformationCommand::class;
    }
}
