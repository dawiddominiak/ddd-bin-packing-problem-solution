<?php

namespace DawidDominiak\Knapsack\App\Domain\Carrier;


use DawidDominiak\Knapsack\App\Shared\EntityInterface;

abstract class AbstractCarrier implements EntityResponsibleForPackInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * AbstractCarrier constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param EntityInterface $other
     * @return bool
     */
    public function sameIdentityAs(EntityInterface $other)
    {
        if (!$other instanceof static) {
            return false;
        }

        return $this->name === $other->name;
    }
}