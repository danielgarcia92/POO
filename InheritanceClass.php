<?php

function show($message, $color = 'black')
{
    echo "<p style='color: $color'>$message</p>";
}

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

abstract class Weapon
{
    protected $name;
    protected $type;
    protected $effectiveness;

    public function __construct($name, $type, $effectiveness)
    {
        $this->name = $name;
        $this->type = $type;
        $this->effectiveness = $effectiveness;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getEffectiveness()
    {
        return $this->effectiveness;
    }
}

class AWM extends Weapon
{
    public function __construct($name, $type, $effectiveness)
    {
        parent::__construct($name, $type, $effectiveness);
    }
}

class Barret extends Weapon
{

}

class Knife extends Weapon
{

}

class Recruit extends Unit
{
    protected $armor;
    protected $damage = 10;

    public function attackAction(Unit $enemy)
    {
        show(
            "{$this->getName()} dispara a  {$enemy->getName()} con su rifle MP5",
            'gold'
        );

        $enemy->takeDamage($this->damage);
    }
}

class Sniper extends Unit
{
    protected $armor;
    protected $damage = 20;

    public function attackAction(Unit $enemy)
    {
        show(
            "{$this->getName()} le disparó a {$enemy->getName()} con su francotirador",
            'cornflowerblue'
        );

        $enemy->takeDamage($this->damage);

    }
}

interface Armor                             //Polymorphism
{
    public function absorbDamage($damage);
}

class BronzeArmor implements Armor
{
    public function absorbDamage($damage)
    {
        return $damage / 2;
    }
}

class SilverArmor implements Armor
{
    public function absorbDamage($damage)
    {
        return $damage / 3;
    }
}

class GoldenArmor implements Armor
{
    public function absorbDamage($damage)
    {
        return $damage / 4;
    }
}

$bronzeArmor = new BronzeArmor();
$silverArmor = new SilverArmor();

$fo = new Recruit('Fo');

$tirofijo = new Sniper('Tirofijo');
$tirofijo->moveAction('la derecha');


$tirofijo->attackAction($fo);
$fo->setArmor($silverArmor);        //Dependency Injection DI
$fo->attackAction($tirofijo);
$tirofijo->setArmor($bronzeArmor);  //Dependency Injection DI
$tirofijo->attackAction($fo);
$fo->attackAction($tirofijo);
$tirofijo->attackAction($fo);
