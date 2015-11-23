<?php

namespace DawidDominiak\Knapsack\App\Shared;


use Rhumsaa\Uuid\Uuid;

abstract class UuidId implements ValueObjectInterface
{
    protected $value;

    public function __construct(Uuid $uuid)
    {
        $this->value = $uuid->toString();
    }

    public function toString()
    {
        return $this->value;
    }

    public function sameValueAs(ValueObjectInterface $other)
    {
        if (!$other instanceof GuidId)
        {
            return false;
        }

        return $this->toString() === $other->toString();
    }
}