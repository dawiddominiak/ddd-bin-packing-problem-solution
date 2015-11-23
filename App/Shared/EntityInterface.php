<?php

namespace DawidDominiak\Knapsack\App\Shared;


interface EntityInterface
{
    /**
     * @param EntityInterface $other
     * @return bool
     */
    public function sameIdentityAs(EntityInterface $other);
}