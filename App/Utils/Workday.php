<?php

namespace DawidDominiak\Knapsack\App\Utils;


use DawidDominiak\Knapsack\App\Domain\Carrier\Truck;
use DawidDominiak\Knapsack\App\Domain\Warehouseman\Warehouseman;

class Workday
{
    /**
     * @param Truck $truck
     * @param Warehouseman $warehouseman
     */
    public static function begin(Truck $truck, Warehouseman $warehouseman)
    {
        $packs = $truck->doUnload($warehouseman);
        $warehouseman->pack($packs, Courrier::getGenerator());
    }
}