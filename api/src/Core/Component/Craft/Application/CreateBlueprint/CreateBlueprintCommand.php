<?php

namespace App\Core\Component\Craft\Application\CreateBlueprint;

use App\Core\SharedKernel\Application\CommandInterface;

class CreateBlueprintCommand implements CommandInterface
{
    public string $name;
}
