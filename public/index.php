<?php

namespace Game;

use Game\Weapons\FireBow;
use Game\Weapons\LongSword;

require '../vendor/autoload.php';

Translator::set([
    'BasicBowAttack'   => ':unit lanza una flecha a :opponent',
    'CrossBowAttack'   => ':unit ataca con la ballesta a :opponent',
    'FireBowAttack'    => ':unit shot a fire arrow to :opponent',
    'BasicSwordAttack' => ':unit ataca con la espada básica a :opponent',
    'LongSwordAttack'  => ':unit ataca con la grandiosa espada larga a :opponent',
    'ReduceHp'         => ':opponent has now :hp hp'
]);

$soldier1 =  new Unit( 'Fo', new LongSword());
$archer1 = new Unit( 'Tirofijo', new FireBow());

$archer1->attack($soldier1);
//$soldier1->setArmor(new Armors\BronzeArmor());
$archer1->attack($soldier1);
//$archer1->setWeapon(new MachineGun());
//$archer1->setArmor(new SilverArmor());
$soldier1->attack($archer1);
$archer1->attack($soldier1);
$archer1->attack($soldier1);
