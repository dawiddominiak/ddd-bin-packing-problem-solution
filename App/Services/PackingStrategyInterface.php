<?php

namespace DawidDominiak\Knapsack\App\Services;


use DawidDominiak\Knapsack\App\Domain\Pack\Pack;

interface PackingStrategyInterface
{
    /**
     * @param Pack[] $packs
     * @param \Generator $courrierGenerator
     * @return mixed
     */
    public function pack($packs, \Generator $courrierGenerator);
}