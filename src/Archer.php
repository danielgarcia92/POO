<?php

namespace Game;

use Game\Weapons\Bow;

class Archer extends Unit
{
    /**
     * Archer constructor.
     * @param $name
     * @param Bow $bow
     */
    public function __construct($name, Bow $bow)
    {
        parent::__construct($name, $bow);
    }
}
