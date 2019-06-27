<?php

namespace Game;

class Attack
{
    protected $damage;
    protected $magical;
    protected $description;

    /**
     * Attack constructor.
     * @param $damage
     * @param $magical
     * @param $description
     */
    public function __construct($damage, $magical, $description)
    {
        $this->damage = $damage;
        $this->magical = $magical;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return mixed
     */
    public function isMagical()
    {
        return $this->magical;
    }

    /**
     * @return mixed
     */
    public function isPhysical()
    {
        return !$this->magical;
    }

    /**
     * @param Unit $attacker
     * @param Unit $opponent
     * @return mixed
     */
    public function getDescription(Unit $attacker, Unit $opponent)
    {
        return str_replace(
            [':unit', ':opponent'],
            [$attacker->getName(), $opponent->getName()],
            $this->description
        );
    }

}
