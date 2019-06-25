<?php

class Archer extends Unit
{
    protected $armor;
    protected $damage = 20;

    public function attackAction(Unit $enemy)
    {
        show(
            "{$this->getName()} le disparó a {$enemy->getName()} con su arco",
            'cornflowerblue'
        );

        $enemy->takeDamage($this->damage);

    }
}
