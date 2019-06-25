<?php

require 'src/helpers.php';

spl_autoload_register(function ($className) {
    require "src/$className.php";
});

$bronzeArmor = new BronzeArmor();
$silverArmor = new SilverArmor();

$fo = new Soldier('Fo');

$tirofijo = new Archer('Tirofijo');
$tirofijo->moveAction('la derecha');

$tirofijo->attackAction($fo);
$fo->setArmor($silverArmor);        //Dependency Injection DI
$fo->attackAction($tirofijo);
$tirofijo->setArmor($bronzeArmor);  //Dependency Injection DI
$tirofijo->attackAction($fo);
$fo->attackAction($tirofijo);
$tirofijo->attackAction($fo);
