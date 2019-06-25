<?php

abstract class Unit
{
    protected $name;
    protected $armor;
    protected $hp = 40;

    abstract public function attackAction(Unit $enemy);

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function moveAction($direction)
    {
        show(
            "{$this->name} avanza hacia $direction"
        );
    }

    public function dead()
    {
        show(
            "{$this->name} muere",
            'magenta'
        );

        exit();
    }

    public function takeDamage($damage)
    {
        $this->hp -= $this->absorbDamage($damage);

        if ($this->hp <= 0)
            $this->dead();

        show("{$this->name} ahora tiene {$this->hp} de HP");
    }

    public function setArmor(Armor $armor = null)   //Dependency Injection DI
    {
        $this->armor = $armor;
    }

    protected function absorbDamage($damage)        //Polymorphism
    {
        if ($this->armor)
            $damage = $this->armor->absorbDamage($damage);

        return $damage;
    }
}
