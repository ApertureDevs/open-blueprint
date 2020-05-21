<?php
namespace App\Core\BoundedContext\Blueprint\Domain;

class Blueprint
{
    private string $id;

    private string $name;

    public function __construct(string $name)
    {
        $uuid = uuid_create(UUID_TYPE_RANDOM);

        if ($uuid === null) {
            throw new \RuntimeException('Uuid cannot be null.');
        }
        $this->id = $uuid;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
