<?php

require_once './vendor/autoload.php';

$loader = new \Symfony\Component\ClassLoader\Psr4ClassLoader();
$loader->addPrefix('DawidDominiak\\Knapsack\\App', __DIR__ . '/App');

$loader->register(true);