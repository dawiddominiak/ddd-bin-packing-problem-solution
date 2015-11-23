<?php

namespace DawidDominiak\Knapsack\App\Domain\Pack;


use DawidDominiak\Knapsack\App\Domain\Carrier\ResponsibleEntityInterface;
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
    private $observers;

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

    public function addObserver(ObserverInterface $observer)
    {
        array_push($this->observers, $observer);
    }

    public function removeObserver(ObserverInterface $observer)
    {
        $this->observers = array_filter($this->observers, function($element) use ($observer) {
            return !$observer->sameIdentityAs($element);
        });
    }

    public function informObservers(UpdateEvent $event)
    {
        foreach($this->observers as $observer)
        {
            $observer->onUpdate($event);
        }
    }

    /**
     * @param string $action
     * @param ResponsibleEntityInterface $entity
     */
    public function updateState($action, ResponsibleEntityInterface $entity)
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
        if(!$other instanceof Pack)
        {
            return false;
        }
        return $this->packId->sameValueAs($other->packId);
    }
}