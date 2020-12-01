<?php

namespace App\Infrastructure\Persistence\RelationalModel;

class QueryNameGenerator
{
    private int $incrementedAssociation = 1;
    private int $incrementedName = 1;

    public function generateAliasName(string $name): string
    {
        return sprintf('%s_alias_%d', $name, $this->incrementedAssociation++);
    }

    public function generateParameterName(string $name): string
    {
        return sprintf('%s_parameter_%d', str_replace('.', '_', $name), $this->incrementedName++);
    }
}
