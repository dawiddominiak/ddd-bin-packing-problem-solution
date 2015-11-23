<?php

namespace DawidDominiak\Knapsack\App\Services;


use DawidDominiak\Knapsack\App\Domain\Pack\Pack;

class GreedyPackingStrategy implements PackingStrategyInterface
{

    /**
     * @param Pack[] $packs
     * @param \Generator $courrierGenerator
     * @return mixed
     */
    public function pack($packs, \Generator $courrierGenerator)
    {
        $this->sortPacksByWeightDesc($packs);

        foreach($packs as $pack)
        {
            foreach($courrierGenerator as $courrier)
            {
                if($courrier->tryLoadPack($pack))
                {
                    break;
                }
            }
        }
    }

    /**
     * @param Pack[] $packs
     */
    private function sortPacksByWeightDesc(&$packs)
    {
        usort(
            $packs,
            /**
             * @param Pack $a
             * @param Pack $b
             * @return int
             */
            function($a, $b) {
                $weightA = $a->getWeight();
                $weightB = $b->getWeight();

                if($weightA === $weightB)
                {
                    return 0;
                }

                return ($weightA > $weightB) ? -1 : 1;
            }
        );
    }
}