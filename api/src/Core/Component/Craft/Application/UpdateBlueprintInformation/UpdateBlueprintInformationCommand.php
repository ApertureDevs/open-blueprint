<?php

namespace App\Core\Component\Craft\Application\UpdateBlueprintInformation;

use App\Core\SharedKernel\Application\CommandInterface;

class UpdateBlueprintInformationCommand implements CommandInterface
{
    public string $id;
    public string $name;
}
