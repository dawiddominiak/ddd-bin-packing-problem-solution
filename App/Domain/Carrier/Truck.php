<?php

namespace DawidDominiak\Knapsack\App\Domain\Carrier;


use DawidDominiak\Knapsack\App\Domain\Pack\Pack;

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
     * @return \DawidDominiak\Knapsack\App\Domain\Pack\Pack[]
     */
    public function doUnload()
    {
        $packs = $this->packs;
        $this->packs = [];

        return $packs;
    }
}