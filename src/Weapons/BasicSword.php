<?php

namespace Game\Weapons;

use Game\Unit;

class BasicSword extends Sword
{
    protected $damage = 10;

    public function getDescription(Unit $attacker, Unit $opponent)
    {
        return "{$attacker->getName()} ataca con la espada básica a {$opponent->getName()}";
    }
}
