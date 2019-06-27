<?php

namespace Game\Weapons;

use Game\Weapon;

class BasicBow extends Weapon
{
    protected $damage = 20;
    protected $description = ":unit lanza una flecha a :opponent";

}
