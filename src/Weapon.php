<?php

abstract class Weapon
{
    protected $name;
    protected $type;
    protected $effectiveness;

    public function __construct($name, $type, $effectiveness)
    {
        $this->name = $name;
        $this->type = $type;
        $this->effectiveness = $effectiveness;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getEffectiveness()
    {
        return $this->effectiveness;
    }
}
