<?php

namespace DawidDominiak\Knapsack\App\Shared;


use DawidDominiak\Knapsack\App\Values\UpdateEvent;

interface ObservableInterface
{
    public function addObserver(ObserverInterface $observer);
    public function removeObserver(ObserverInterface $observer);
    public function informObservers(UpdateEvent $event);
}