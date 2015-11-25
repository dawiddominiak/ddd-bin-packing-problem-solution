<?php

namespace DawidDominiak\Knapsack\App\Domain\Warehouseman;


use DawidDominiak\Knapsack\App\Domain\Carrier\Truck;
use DawidDominiak\Knapsack\App\Domain\Pack\Pack;
use DawidDominiak\Knapsack\App\Services\PackingStrategyInterface;
use DawidDominiak\Knapsack\App\Shared\EntityInterface;
use DawidDominiak\Knapsack\App\Shared\ObserverInterface;
use DawidDominiak\Knapsack\App\Values\UpdateEvent;

class Warehouseman implements ObserverInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var UpdateEvent[]
     */
    private $events = [];

    /**
     * @var PackingStrategyInterface
     */
    private $packingStrategy;

    /**
     * Warehouseman constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param UpdateEvent $event
     */
    public function onUpdate(UpdateEvent $event)
    {
        array_push($this->events, $event);
    }

    /**
     * @param PackingStrategyInterface $packingStrategy
     */
    public function setPackingStrategy(PackingStrategyInterface $packingStrategy)
    {
        $this->packingStrategy = $packingStrategy;
    }

    /**
     * @param Pack[] $packs
     * @param \Generator $courrierGenerator
     */
    public function pack($packs, \Generator $courrierGenerator)
    {
        $this->packingStrategy->pack($packs, $courrierGenerator);
    }

    public function unload(Truck $truck)
    {
        $packs = $truck->doUnload();

        foreach($packs as $pack)
        {
            $pack->addObserver($this);
            $pack->updateState('unloaded', $truck);
        }

        return $packs;
    }

    /**
     * @return \DawidDominiak\Knapsack\App\Values\UpdateEvent[]
     */
    public function getObservedEvents()
    {
        return $this->events;
    }

    /**
     * @param EntityInterface $other
     * @return bool
     */
    public function sameIdentityAs(EntityInterface $other)
    {
        if(!$other instanceof Warehouseman)
        {
            return false;
        }

        return $this->name === $other->name;
    }

}