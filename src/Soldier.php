<?php

namespace Game;

use Game\Weapons\Sword;

class Soldier extends Unit
{
    /**
     * Archer constructor.
     * @param $name
     * @param Sword $sword
     */
    public function __construct($name, Sword $sword)
    {
        parent::__construct($name, $sword);
    }
}
