<?php

namespace Game\Weapons;

use Game\Unit;

class BasicBow extends Bow
{
    protected $damage = 20;

    public function getDescription(Unit $attacker, Unit $opponent)
    {
        return "{$attacker->getName()} lanza una flecha a {$opponent->getName()}";
    }
}
