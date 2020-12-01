<?php

namespace App\Infrastructure\Projection\RelationalModel\Model;

class Team implements EntityInterface
{
    private string $id;
    private Blueprint $blueprint;
    private \DateTimeImmutable $createDate;
    private \DateTimeImmutable $updateDate;

    private function __construct()
    {
    }

    public static function create(string $id, Blueprint $blueprint, \DateTimeImmutable $createDate): Team
    {
        $team = new Team();
        $team->id = $id;
        $team->blueprint = $blueprint;
        $team->createDate = $createDate;
        $team->updateDate = $createDate;

        return $team;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBlueprint(): Blueprint
    {
        return $this->blueprint;
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
