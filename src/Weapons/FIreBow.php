<?php

namespace Game\Weapons;

use Game\Weapon;

class FireBow extends Weapon
{
    protected $damage = 30;
    protected $magical = true;
    protected $description = ":unit lanza una flecha de fuego a :opponent";

}
