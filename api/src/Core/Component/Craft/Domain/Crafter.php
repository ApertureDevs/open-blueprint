<?php

namespace App\Core\Component\Craft\Domain;

class Crafter
{
    private string $id;
    private string $name;

    public function __construct(string $name)
    {
        $uuid = uuid_create(UUID_TYPE_RANDOM);

        if (null === $uuid) {
            throw new \RuntimeException('Uuid cannot be null.');
        }
        $this->id = $uuid;
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
