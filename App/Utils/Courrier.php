<?php

namespace DawidDominiak\Knapsack\App\Utils;


class Courrier
{
    public static function getGenerator()
    {
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('ABC company');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('Janek ltd');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('Lorem');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('Ipsum');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('Dolor');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('Sit');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('Amet LTD.');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('Bla ble');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('ZXY company');
        yield new \DawidDominiak\Knapsack\App\Domain\Carrier\Courrier('Dog Enterprise');
    }
}