<?php

namespace App\Infrastructure\Persistence\RelationalModel\Repository;

use App\Core\Component\Craft\Application\ShowBlueprintItem\BlueprintItem;
use App\Core\Component\Craft\Port\GetBlueprintItemRepositoryInterface;
use App\Infrastructure\Projection\RelationalModel\Model\Blueprint;
use Doctrine\ORM\EntityManagerInterface;

class BlueprintRepository implements GetBlueprintItemRepositoryInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $relationalModelEntityManager)
    {
        $this->entityManager = $relationalModelEntityManager;
    }

    public function save(Blueprint $blueprint): void
    {
        $this->entityManager->persist($blueprint);
        $this->entityManager->flush();
    }

    public function getBlueprintItem(string $id): ?BlueprintItem
    {
        $entity = $this->getEntity($id);

        if (null === $entity) {
            return null;
        }

        $blueprint = new BlueprintItem();
        $blueprint->id = $entity->getId();
        $blueprint->name = $entity->getName();
        $blueprint->createDate = $entity->getCreateDate();
        $blueprint->updateDate = $entity->getUpdateDate();

        return $blueprint;
    }

    public function getEntity(string $id): ?Blueprint
    {
        $entity = $this->entityManager->find(Blueprint::class, $id);

        if (null === $entity) {
            return null;
        }

        if (!$entity instanceof Blueprint) {
            throw new \RuntimeException('Invalid entity instance generated.');
        }

        return $entity;
    }
}
