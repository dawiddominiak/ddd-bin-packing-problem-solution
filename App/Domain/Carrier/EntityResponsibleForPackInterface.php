<?php

namespace DawidDominiak\Knapsack\App\Domain\Carrier;


use DawidDominiak\Knapsack\App\Shared\EntityInterface;

interface EntityResponsibleForPackInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getName();
}