<?php

namespace App\Infrastructure\Persistence\RelationalModel\Repository;

use App\Core\SharedKernel\Application\Filter\FilterInterface;
use App\Infrastructure\Persistence\RelationalModel\Filter\FilterConverterCollection;
use App\Infrastructure\Persistence\RelationalModel\QueryNameGenerator;
use App\Infrastructure\Projection\RelationalModel\Model\EntityInterface;
use Doctrine\ORM\EntityManagerInterface;

abstract class Repository
{
    protected EntityManagerInterface $entityManager;

    protected QueryNameGenerator $queryNameGenerator;

    protected FilterConverterCollection $filterConvertorCollection;

    public function __construct(EntityManagerInterface $relationalModelEntityManager, QueryNameGenerator $queryNameGenerator, FilterConverterCollection $filterConvertorCollection)
    {
        $this->entityManager = $relationalModelEntityManager;
        $this->queryNameGenerator = $queryNameGenerator;
        $this->filterConvertorCollection = $filterConvertorCollection;
    }

    public function save(EntityInterface $entity): void
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function remove(EntityInterface $entity): void
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    public function getEntity(string $id): ?EntityInterface
    {
        $entity = $this->entityManager->find($this->getEntityClass(), $id);

        if (null === $entity) {
            return null;
        }

        if (!$entity instanceof EntityInterface) {
            throw new \RuntimeException('Invalid entity instance generated.');
        }

        return $entity;
    }

    /**
     * @param iterable<FilterInterface> $filters
     *
     * @return EntityInterface[]
     */
    public function getEntities(iterable $filters): array
    {
        $rootAlias = $this->queryNameGenerator->generateAliasName('root');
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select($rootAlias)
            ->from($this->getEntityClass(), $rootAlias)
        ;

        foreach ($filters as $filter) {
            foreach ($this->filterConvertorCollection->getAll() as $filterConvertor) {
                if ($filterConvertor->supports($filter)) {
                    $filterConvertor->apply($queryBuilder, $filter);
                }
            }
        }

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @return class-string<mixed>
     */
    abstract protected function getEntityClass(): string;
}
