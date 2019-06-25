<?php

class Soldier extends Unit
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
