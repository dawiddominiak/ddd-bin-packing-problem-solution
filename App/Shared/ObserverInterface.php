<?php

namespace DawidDominiak\Knapsack\App\Shared;


use DawidDominiak\Knapsack\App\Values\UpdateEvent;

//Observer must be entity
interface ObserverInterface extends EntityInterface
{
    /**
     * @param UpdateEvent $event
     * @return void
     */
    public function onUpdate(UpdateEvent $event);
}