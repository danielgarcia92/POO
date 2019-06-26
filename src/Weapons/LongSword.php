<?php

namespace Game\Weapons;

use Game\Unit;

class LongSword extends Sword
{
    protected $damage = 25;

    public function getDescription(Unit $attacker, Unit $opponent)
    {
        return "{$attacker->getName()} ataca con la grandiosa espada larga a {$opponent->getName()}";
    }
}
