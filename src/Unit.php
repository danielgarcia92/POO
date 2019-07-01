<?php

namespace Game;

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

        show($attack->getKey($this, $opponent), 'green');

        $opponent->takeDamage($attack);
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

    public function takeDamage(Attack $attack)
    {
        $this->hp -= $this->armor->absorbDamage($attack);

        if ($this->hp <= 0)
            $this->die();

//        show("{$this->name} ahora tiene {$this->hp} de HP");

        show(
            Translator::get('ReduceHp', [
                'opponent' => $this->name,
                'hp' => $this->hp
            ])
        );
    }

}
