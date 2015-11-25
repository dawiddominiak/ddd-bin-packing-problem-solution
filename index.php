<?php

require_once './autoloader.php';

use DawidDominiak\Knapsack\App\Domain\Carrier\Truck;
use DawidDominiak\Knapsack\App\Domain\Pack\Pack;
use DawidDominiak\Knapsack\App\Domain\Pack\PackId;
use DawidDominiak\Knapsack\App\Domain\Warehouseman\Warehouseman;
use DawidDominiak\Knapsack\App\Services\GreedyPackingStrategy;
use DawidDominiak\Knapsack\App\Utils\Workday;
use Rhumsaa\Uuid\Uuid;

$packs = [
    new Pack(
        new PackId(Uuid::uuid4()),
        30
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        30
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        40
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        50
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        60
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        70
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        80
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        50
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        40
    ),
    new Pack(
        new PackId(Uuid::uuid4()),
        100
    )
];
$truck = new Truck('Grzegorz Services LTD');
$truck->load($packs);
$warehouseman = new Warehouseman('Mr. Janusz');
$warehouseman->setPackingStrategy(
    new GreedyPackingStrategy()
);

Workday::begin($truck, $warehouseman);
$events = $warehouseman->getObservedEvents();