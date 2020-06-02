<?php

namespace App\Infrastructure\Persistence\RelationalModel\Repository;

use App\Core\Component\Team\Application\ShowTeamItem\TeamItem;
use App\Core\Component\Team\Port\GetTeamItemRepositoryInterface;
use App\Infrastructure\Projection\RelationalModel\Model\Team;
use Doctrine\ORM\EntityManagerInterface;

class TeamRepository implements GetTeamItemRepositoryInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $relationalModelEntityManager)
    {
        $this->entityManager = $relationalModelEntityManager;
    }

    public function save(Team $team): void
    {
        $this->entityManager->persist($team);
        $this->entityManager->flush();
    }

    public function getTeamItem(string $id): ?TeamItem
    {
        $entity = $this->getEntity($id);

        if (null === $entity) {
            return null;
        }

        $blueprint = new TeamItem();
        $blueprint->id = $entity->getId();
        $blueprint->blueprintId = $entity->getBlueprint()->getId();
        $blueprint->createDate = $entity->getCreateDate();
        $blueprint->updateDate = $entity->getUpdateDate();

        return $blueprint;
    }

    public function getEntity(string $id): ?Team
    {
        $entity = $this->entityManager->find(Team::class, $id);

        if (null === $entity) {
            return null;
        }

        if (!$entity instanceof Team) {
            throw new \RuntimeException('Invalid entity instance generated.');
        }

        return $entity;
    }
}
