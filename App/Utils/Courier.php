<?php

namespace DawidDominiak\Knapsack\App\Utils;


class Courier
{
    public static function getGenerator()
    {
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('ABC company');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('Janek ltd');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('Lorem');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('Ipsum');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('Dolor');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('Sit');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('Amet LTD.');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('Bla ble');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('ZXY company');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courier('Dog Enterprise');
    }
}