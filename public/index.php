<?php

namespace Game;

use Game\Weapons\CrossBow;
use Game\Weapons\LongSword;

require '../vendor/autoload.php';

$soldier1 =  new Soldier( 'Fo', new LongSword());
$archer1 = new Archer( 'Tirofijo', new CrossBow());

$archer1->attack($soldier1);
$soldier1->setArmor(new Armors\BronzeArmor());
$archer1->attack($soldier1);
//$archer1->setWeapon(new MachineGun());
//$archer1->setArmor(new SilverArmor());
$soldier1->attack($archer1);
$archer1->attack($soldier1);
$archer1->attack($soldier1);
