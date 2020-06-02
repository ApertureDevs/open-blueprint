<?php

namespace App\Core\Component\User\Domain;

class Account
{
    private string $id;

    public function __construct()
    {
        $uuid = uuid_create(UUID_TYPE_RANDOM);

        if (null === $uuid) {
            throw new \RuntimeException('Uuid cannot be null.');
        }
        $this->id = $uuid;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
