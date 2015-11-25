<?php

namespace DawidDominiak\Knapsack\App\Values;


use DawidDominiak\Knapsack\App\Domain\Carrier\EntityResponsibleForPackInterface;
use DawidDominiak\Knapsack\App\Domain\Pack\Pack;
use DawidDominiak\Knapsack\App\Shared\ValueObjectInterface;


//TODO: think about create abstract UpdateEvent and child PackUpdateEvent
class UpdateEvent implements ValueObjectInterface
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var EntityResponsibleForPackInterface
     */
    private $entity;

    /**
     * @var Pack
     */
    private $pack;

    public function __construct($action, EntityResponsibleForPackInterface $entity, Pack $pack)
    {
        $this->action = $action;
        $this->entity = $entity;
        $this->pack = $pack;
    }

    /**
     * @param ValueObjectInterface $other
     * @return bool
     */
    public function sameValueAs(ValueObjectInterface $other)
    {
        if (!$other instanceof UpdateEvent) {
            return false;
        }

        return $this->action === $other->action &&
        $this->entity->sameIdentityAs($other->entity);
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return EntityResponsibleForPackInterface
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return Pack
     */
    public function getPack()
    {
        return $this->pack;
    }
}