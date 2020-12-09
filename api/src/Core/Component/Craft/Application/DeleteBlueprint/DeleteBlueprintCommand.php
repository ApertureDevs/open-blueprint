<?php

namespace App\Core\Component\Craft\Application\DeleteBlueprint;

use App\Core\SharedKernel\Application\CommandInterface;

class DeleteBlueprintCommand implements CommandInterface
{
    public string $id;
}
