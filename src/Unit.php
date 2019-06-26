<?php

namespace Game;

abstract class Unit {
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
    }

    protected function absorbDamage($damage)
    {
        if ($this->armor)
            $damage = $this->armor->absorbDamage($damage);

        return $damage;
    }

    public function attack(Unit $opponent)
    {
        show($this->weapon->getDescription($this, $opponent), 'green');

        $opponent->takeDamage($this->weapon->getDamage());
    }

    public function die()
    {
        show("{$this->name} muere :(");
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
        show("{$this->name} se mueve hacia $direction");
    }

    public function setArmor(Armor $armor): void    // Dependency Injection
    {
        $this->armor = $armor;
    }

    public function setWeapon(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function takeDamage($damage)
    {
        $this->hp -= $this->absorbDamage($damage);

        if ($this->hp <= 0)
            $this->die();

        show("{$this->name} ahora tiene {$this->hp} de HP");
    }

}
