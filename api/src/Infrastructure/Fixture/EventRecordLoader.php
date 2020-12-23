<?php

namespace App\Infrastructure\Fixture;

use App\Core\SharedKernel\Domain\Event\EventRecord;
use Fidry\AliceDataFixtures\LoaderInterface;
use Fidry\AliceDataFixtures\Persistence\PurgeMode;

class EventRecordLoader implements LoaderInterface
{
    private LoaderInterface $decoratedLoader;

    private StorableEventRecordFactory $eventRecordFactory;

    public function __construct(
        LoaderInterface $decoratedLoader,
        StorableEventRecordFactory $eventRecordFactory
    ) {
        $this->decoratedLoader = $decoratedLoader;
        $this->eventRecordFactory = $eventRecordFactory;
    }

    /**
     * @param array<string>         $fixturesFiles
     * @param array<string, mixed>  $parameters
     * @param array<string, object> $objects
     *
     * @return array<string, object>
     */
    public function load(array $fixturesFiles, array $parameters = [], array $objects = [], PurgeMode $purgeMode = null): array
    {
        $objects = $this->decoratedLoader->load($fixturesFiles, $parameters, $objects, $purgeMode);

        return $this->addStorableEventRecords($objects);
    }

    /**
     * @param array<string, object> $objects
     *
     * @return array<string, object>
     */
    private function addStorableEventRecords(array $objects): array
    {
        foreach ($objects as $key => $object) {
            if ($object instanceof EventRecord) {
                $objects[$key.'.storable_event_record_'.$object->getPlayHead()] = $this->eventRecordFactory->create($object);
            }
        }

        return $objects;
    }
}
