<?php

namespace DawidDominiak\Knapsack\App\Domain\Pack;


use DawidDominiak\Knapsack\App\Domain\Carrier\EntityResponsibleForPackInterface;
use DawidDominiak\Knapsack\App\Shared\EntityInterface;
use DawidDominiak\Knapsack\App\Shared\ObservableInterface;
use DawidDominiak\Knapsack\App\Shared\ObserverInterface;
use DawidDominiak\Knapsack\App\Values\UpdateEvent;

class Pack implements ObservableInterface, EntityInterface
{
    /**
     * @var PackId
     */
    private $packId;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var ObserverInterface[]
     */
    private $observers = [];

    /**
     * Pack constructor.
     * @param PackId $id
     * @param int $weight
     */
    public function __construct(PackId $id, $weight)
    {
        $this->packId = $id;
        $this->weight = $weight;
    }

    /**
     * @return PackId
     */
    public function getPackId()
    {
        return $this->packId;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param ObserverInterface $observer
     */
    public function addObserver(ObserverInterface $observer)
    {
        array_push($this->observers, $observer);
    }

    /**
     * @param ObserverInterface $observer
     */
    public function removeObserver(ObserverInterface $observer)
    {
        $this->observers = array_filter($this->observers, function ($element) use ($observer) {
            return !$observer->sameIdentityAs($element);
        });
    }

    /**
     * @param UpdateEvent $event
     */
    public function informObservers(UpdateEvent $event)
    {
        foreach ($this->observers as $observer) {
            $observer->onUpdate($event);
        }
    }

    /**
     * @param string $action
     * @param EntityResponsibleForPackInterface $entity
     */
    public function updateState($action, EntityResponsibleForPackInterface $entity)
    {
        $this->informObservers(
            new UpdateEvent($action, $entity, $this)
        );
    }

    /**
     * @param EntityInterface $other
     * @return bool
     */
    public function sameIdentityAs(EntityInterface $other)
    {
        if (!$other instanceof Pack) {
            return false;
        }
        return $this->packId->sameValueAs($other->packId);
    }
}