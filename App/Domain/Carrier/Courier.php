<?php

namespace DawidDominiak\Knapsack\App\Domain\Carrier;


use DawidDominiak\Knapsack\App\Domain\Pack\Pack;

class Courier extends AbstractCarrier
{
    /**
     * @var Pack[]
     */
    private $packs = [];

    /**
     * @var int
     */
    private $maxLoad = 200;

    /**
     * Courrier constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
    }

    /**
     * @param Pack $pack
     * @return bool
     */
    public function tryLoadPack(Pack $pack)
    {
        $packWeight = $pack->getWeight();

        if ($this->maxLoad - $this->getLoadWeight() < $packWeight) {
            return false;
        }

        array_push($this->packs, $pack);
        $pack->updateState("packed", $this);

        return true;
    }

    /**
     * @return int
     */
    public function getLoadWeight()
    {
        $weight = 0;

        foreach ($this->packs as $pack) {
            $weight += $pack->getWeight();
        }

        return $weight;
    }
}