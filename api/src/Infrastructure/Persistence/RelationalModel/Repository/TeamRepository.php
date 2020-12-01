<?php

namespace App\Infrastructure\Persistence\RelationalModel\Repository;

use App\Core\Component\Team\Application\ShowTeamItem\TeamItem;
use App\Core\Component\Team\Port\GetTeamItemRepositoryInterface;
use App\Infrastructure\Projection\RelationalModel\Model\EntityInterface;
use App\Infrastructure\Projection\RelationalModel\Model\Team;

class TeamRepository extends Repository implements GetTeamItemRepositoryInterface
{
    public function getTeamItem(string $id): ?TeamItem
    {
        $entity = $this->getEntity($id);

        if (null === $entity) {
            return null;
        }

        return $this->createDTOFromEntity($entity);
    }

    protected function getEntityClass(): string
    {
        return Team::class;
    }

    private function createDTOFromEntity(EntityInterface $entity): TeamItem
    {
        if (!$entity instanceof Team) {
            throw new \RuntimeException('Invalid entity returned.');
        }

        $team = new TeamItem();
        $team->id = $entity->getId();
        $team->blueprintId = $entity->getBlueprint()->getId();
        $team->createDate = $entity->getCreateDate();
        $team->updateDate = $entity->getUpdateDate();

        return $team;
    }
}
