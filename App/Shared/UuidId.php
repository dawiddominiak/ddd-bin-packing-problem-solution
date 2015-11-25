<?php

namespace DawidDominiak\Knapsack\App\Shared;


use Rhumsaa\Uuid\Uuid;

abstract class UuidId implements ValueObjectInterface
{
    /**
     * @var string
     */
    protected $value;

    /**
     * UuidId constructor.
     * @param Uuid $uuid
     */
    public function __construct(Uuid $uuid)
    {
        $this->value = $uuid->toString();
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->value;
    }

    /**
     * @param ValueObjectInterface $other
     * @return bool
     */
    public function sameValueAs(ValueObjectInterface $other)
    {
        if (!$other instanceof UuidId)
        {
            return false;
        }

        return $this->toString() === $other->toString();
    }
}