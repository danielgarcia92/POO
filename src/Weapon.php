<?php

namespace Game;

abstract class Weapon
{
    protected $damage = 0;
    protected $magical = false;

    public function createAttack()
    {
        return new Attack($this->damage, $this->magical, $this->getDescriptionKey());   // Factory Method
    }

    public function getDescriptionKey()
    {
        return str_replace('Game\Weapons\\', '', get_class($this)).'Attack';
    }

}
