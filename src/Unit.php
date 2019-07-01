<?php

namespace Game;

use Game\Weapons\BasicBow;
use Game\Weapons\BasicSword;
use Game\Armors\MissingArmor;

class Unit {
    protected $name;
    protected $armor;
    protected $weapon;
    protected $hp = 40;

    /**
     * Unit constructor.
     * @param $name
     * @param Weapon $weapon
     */
    public function __construct($name, Weapon $weapon)
    {
        $this->name = $name;
        $this->weapon = $weapon;
        $this->armor = new MissingArmor();
    }

    public function attack(Unit $opponent)
    {
        $attack = $this->weapon->createAttack();

        Log::info($attack->getKey($this, $opponent));

        $opponent->takeDamage($attack);
    }

    public static function createArcher($name)  //Factory Method y named constructor
    {
        return new Unit($name, new BasicBow());
    }

    public static function createSoldier($name)
    {
        return new Unit($name, new BasicSword());
    }

    public function die()
    {
        Log::info("{$this->name} muere :(");

        exit();
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function getName()
    {
        return $this->name;
    }

    public function move($direction)
    {
        Log::info("{$this->name} se mueve hacia $direction");
    }

    public function setArmor(Armor $armor)    // Dependency Injection
    {
        $this->armor = $armor;

        return $this;
    }

    public function setWeapon(Weapon $weapon)
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function takeDamage(Attack $attack)
    {
        $this->hp -= $this->armor->absorbDamage($attack);

        if ($this->hp <= 0)
            $this->die();

        Log::info(
            Translator::get('ReduceHp', [
                'opponent' => $this->name,
                'hp' => $this->hp
            ])
        );
    }

}
