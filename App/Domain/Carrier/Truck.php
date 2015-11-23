<?php

namespace DawidDominiak\Knapsack\App\Domain\Carrier;


use DawidDominiak\Knapsack\App\Domain\Pack\Pack;
use DawidDominiak\Knapsack\App\Domain\Warehouseman\Warehouseman;

class Truck extends AbstractCarrier
{
    /**
     * @var Pack[]
     */
    private $packs = [];

    public function __construct($name)
    {
        parent::__construct($name);
    }

    /**
     * @param Pack[] $packs
     */
    public function load($packs)
    {
        $this->packs = $packs;
    }

    /**
     * @param Warehouseman $warehouseman
     * @return \DawidDominiak\Knapsack\App\Domain\Pack\Pack[]
     */
    public function doUnload(Warehouseman $warehouseman)
    {
        $packs = $this->packs;

        foreach($packs as $pack)
        {
            $pack->addObserver($warehouseman);
            $pack->updateState("unloaded", $this);
        }

        $this->packs = [];

        return $packs;
    }
}