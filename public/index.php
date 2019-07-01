<?php

namespace Game;

use Game\Armors\BronzeArmor;
use Game\Armors\SilverArmor;
use Game\Weapons\BasicBow;
use Game\Weapons\CrossBow;
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

$archer1 = Unit::createArcher('Tirofijo')
    ->setWeapon(new CrossBow())
    ->setArmor(new SilverArmor());

$soldier1 = Unit::createSoldier('Fo')
    ->setWeapon(new LongSword())
    ->setArmor(new BronzeArmor());

$archer1->attack($soldier1);
$archer1->attack($soldier1);

$soldier1->attack($archer1);

$archer1->attack($soldier1);
