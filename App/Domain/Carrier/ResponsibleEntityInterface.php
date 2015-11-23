<?php

namespace DawidDominiak\Knapsack\App\Domain\Carrier;


use DawidDominiak\Knapsack\App\Shared\EntityInterface;

interface ResponsibleEntityInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getName();
}