<?php

namespace DawidDominiak\Knapsack\App\Shared;


use DawidDominiak\Knapsack\App\Values\UpdateEvent;

interface ObservableInterface
{
    /**
     * @param ObserverInterface $observer
     * @return void
     */
    public function addObserver(ObserverInterface $observer);

    /**
     * @param ObserverInterface $observer
     * @return void
     */
    public function removeObserver(ObserverInterface $observer);

    /**
     * @param UpdateEvent $event
     * @return void
     */
    public function informObservers(UpdateEvent $event);
}