<?php

namespace DawidDominiak\Knapsack\App\Shared;


use DawidDominiak\Knapsack\App\Values\UpdateEvent;

//Observer must be entity
interface ObserverInterface extends EntityInterface
{
    public function onUpdate(UpdateEvent $event);
}