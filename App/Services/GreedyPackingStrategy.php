<?php

namespace DawidDominiak\Knapsack\App\Services;


use DawidDominiak\Knapsack\App\Domain\Carrier\Courier;
use DawidDominiak\Knapsack\App\Domain\Pack\Pack;

class GreedyPackingStrategy implements PackingStrategyInterface
{

    /**
     * @param Pack[] $packs
     * @param \Generator $courierGenerator
     * @return void
     */
    public function pack($packs, \Generator $courierGenerator)
    {
        $this->sortPacksByWeightDesc($packs);
        $this->assertTypeofCourier($courierGenerator->current());

        $neededCourriers = [
            $courierGenerator->current()
        ];

        foreach ($packs as $pack) {

            $loaded = false;
            $this->sortCourriersByLoadDesc($neededCourriers);

            foreach ($neededCourriers as $courier) {

                if ($courier->tryLoadPack($pack)) {

                    $loaded = true;

                    break;
                }
            }

            if (!$loaded) {
                $courierGenerator->next();
                $newCourier = $courierGenerator->current();
                $this->assertTypeofCourier($newCourier);
                array_push($neededCourriers, $newCourier);
                $newCourier->tryLoadPack($pack);
            }
        }
    }

    private function assertTypeofCourier($object)
    {

        if (!$object instanceof Courier) {

            throw new \UnexpectedValueException('Object is not an instance of Courier.');
        }
    }

    /**
     * @param Pack[] $packs
     */
    private function sortPacksByWeightDesc(&$packs)
    {
        $this->sortByWeightDesc($packs, function (Pack $pack) {
            return $pack->getWeight();
        });
    }

    /**
     * @param Courier[] $courriers
     */
    private function sortCourriersByLoadDesc(&$courriers)
    {
        $this->sortByWeightDesc($courriers, function (Courier $courier) {
            return $courier->getLoadWeight();
        });
    }

    /**
     * @param $array
     * @param \Closure $weightCallback
     */
    private function sortByWeightDesc(&$array, \Closure $weightCallback)
    {
        usort(
            $array,
            function ($a, $b) use ($weightCallback) {
                $weightA = $weightCallback($a);
                $weightB = $weightCallback($b);

                if ($weightA === $weightB) {
                    return 0;
                }

                return ($weightA > $weightB) ? -1 : 1;
            }
        );
    }
}