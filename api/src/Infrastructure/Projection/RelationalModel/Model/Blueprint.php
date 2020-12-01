<?php

namespace App\Infrastructure\Projection\RelationalModel\Model;

class Blueprint implements EntityInterface
{
    private string $id;
    private string $name;
    private Team $team;
    private \DateTimeImmutable $createDate;
    private \DateTimeImmutable $updateDate;

    private function __construct()
    {
    }

    public static function create(string $id, string $name, \DateTimeImmutable $createDate): Blueprint
    {
        $blueprint = new Blueprint();
        $blueprint->id = $id;
        $blueprint->name = $name;
        $blueprint->createDate = $createDate;
        $blueprint->updateDate = $createDate;

        return $blueprint;
    }

    public function update(string $name, \DateTimeImmutable $updateDate): void
    {
        $this->name = $name;
        $this->updateDate = $updateDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTeam(): Team
    {
        return $this->team;
    }

    public function getCreateDate(): \DateTimeImmutable
    {
        return $this->createDate;
    }

    public function getUpdateDate(): \DateTimeImmutable
    {
        return $this->updateDate;
    }
}
