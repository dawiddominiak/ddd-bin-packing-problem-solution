<?php

namespace DawidDominiak\Knapsack\App\Shared;


interface ValueObjectInterface
{
    /**
     * @param ValueObjectInterface $other
     * @return bool
     */
    public function sameValueAs(ValueObjectInterface $other);
}