<?php

namespace App\Infrastructure\Persistence\RelationalModel\Repository;

use App\Core\Component\Craft\Application\ShowBlueprintCollection\BlueprintCollection;
use App\Core\Component\Craft\Application\ShowBlueprintItem\BlueprintItem;
use App\Core\Component\Craft\Port\GetBlueprintCollectionRepositoryInterface;
use App\Core\Component\Craft\Port\GetBlueprintItemRepositoryInterface;
use App\Infrastructure\Projection\RelationalModel\Model\Blueprint;
use App\Infrastructure\Projection\RelationalModel\Model\EntityInterface;

class BlueprintRepository extends Repository implements GetBlueprintItemRepositoryInterface, GetBlueprintCollectionRepositoryInterface
{
    public function getBlueprintItem(string $id): ?BlueprintItem
    {
        $entity = $this->getEntity($id);

        if (null === $entity) {
            return null;
        }

        return $this->createDTOFromEntity($entity);
    }

    public function getBlueprintCollection(iterable $filters): BlueprintCollection
    {
        $entities = $this->getEntities($filters);

        $collection = new BlueprintCollection();
        $collection->items = [];
        $collection->totalItems = count($entities);

        foreach ($entities as $entity) {
            $collection->items[] = $this->createDTOFromEntity($entity);
        }

        return $collection;
    }

    protected function getEntityClass(): string
    {
        return Blueprint::class;
    }

    private function createDTOFromEntity(EntityInterface $entity): BlueprintItem
    {
        if (!$entity instanceof Blueprint) {
            throw new \RuntimeException('Invalid entity returned.');
        }
        $blueprint = new BlueprintItem();
        $blueprint->id = $entity->getId();
        $blueprint->name = $entity->getName();
        $blueprint->createDate = $entity->getCreateDate();
        $blueprint->updateDate = $entity->getUpdateDate();

        return $blueprint;
    }
}
